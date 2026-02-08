<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * قائمة المستخدمين (paginated)
     */
    public function index(): JsonResponse
    {
        $users = $this->userService->paginate();

        return response()->json([
            'data' => UserResource::collection($users),
            'meta' => [
                'current_page' => $users->currentPage(),
                'total' => $users->total(),
            ],
        ]);
    }

    /**
     * عرض مستخدم واحد
     */
    public function show(User $user): UserResource
    {
        $user = $this->userService->find($user->id);

        return new UserResource($user);
    }

    /**
     * إنشاء مستخدم جديد
     */
    public function store(StoreUserRequest $request): UserResource
    {
        $user = $this->userService->create($request->validated());

        return new UserResource($user);
    }

    /**
     * تعديل مستخدم
     */
    public function update(UpdateUserRequest $request, User $user): UserResource
    {
        $user = $this->userService->update($user, $request->validated());

        return new UserResource($user);
    }

    /**
     * حذف مستخدم
     */
    public function destroy(User $user): JsonResponse
    {
        $this->userService->delete($user);

        return response()->json(null, 204);
    }
}
