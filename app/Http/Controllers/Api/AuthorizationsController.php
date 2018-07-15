<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Transformers\UserTransformer;
use Dingo\Api\Http\Middleware\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\Api\AuthorizationRequest;

class AuthorizationsController extends Controller
{
    public function store(AuthorizationRequest $request, User $user)
    {
        $credentials['name'] = $request->name;
        $credentials['password'] = $request->password;

        if (!$token = \Auth::guard('api')->attempt($credentials)) {
            return $this->response->errorUnauthorized('用户名或密码错误');
        }


         $query = $user->query();
         $query = $query->where('name', $request->name)->first();
//         return $this->response->array([
//             'ss' => $query
//         ]);

        return $this->response->item($query, new UserTransformer())
            ->setMeta([
                'access_token' => $token,
                'token_type' => 'Bearer',
                'expires_in' => \Auth::guard('api')->factory()->getTTL() * 60
            ])->setStatusCode(201);

//        return $this->response->array([
//            'access_token' => $token,
//            'token_type' => 'Bearer',
//            'expires_in' => \Auth::guard('api')->factory()->getTTL() * 60
//        ])->setStatusCode(201);
    }

    protected function respondWithToken($token)
    {
        return $this->response->array([
           'access_token' => $token,
           'token_type' => 'Bearer',
           'expires_in' => \Auth::guard('api')->factory()->getTTL() * 60
        ]);
    }

    public function update()
    {
        $token = \Auth::guard('api')->refresh();
        return $this->respondWithToken($token);
    }

    public function destroy()
    {
        \Auth::guard('api')->logout();
        return $this->response->noContent();
    }
}
