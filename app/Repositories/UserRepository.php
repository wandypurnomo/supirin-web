<?php


namespace App\Repositories;


use App\Contracts\UserRepositoryContract;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryContract
{
    private $_model;

    public function __construct(User $_model)
    {
        $this->_model = $_model;
    }

    public function register(array $data): Model
    {
        return $this->_model->newQuery()->create($data);
    }

    public function login(array $data, string $guard = 'user')
    {
        if ($guard == "api") return Auth::guard($guard)->attempt($data);
        Auth::guard($guard)->attempt($data);
        return $this->_model->newQuery()->findOrFail(Auth::id());
    }

    public function logout(string $guard = 'user'): void
    {
        Auth::guard($guard)->logout();
    }

    public function profile(string $userId): Model
    {
        return $this->_model->newQuery()->findOrFail($userId);
    }

    public function setActiveStatus(string $userId, int $status): Model
    {
        $user = $this->_model->newQuery()->findOrFail($userId);
        $user->update(["status" => $status]);
        return $user;
    }

    public function setDataVerificationStatus(string $userId, bool $asActive = true): Model
    {
        $user = $this->_model->newQuery()->findOrFail($userId);
        $user->update(["data_verified_at" => $user->freshTimestamp()]);
        return $user;
    }

    public function all(Request $request, int $perPage = 10): LengthAwarePaginator
    {
        $query = $this->_model->newQuery();
        $where = function (Builder $builder) use ($request) {
            if ($request->has("role") && $request->get("role") != "") {
                $role = (int)$request->get("role");
                $builder->where("role", $role);
            }
        };
        $query->where($where);
        return $query->paginate($perPage)->appends($request->query());
    }

    public function find(string $userId): Model
    {
        return $this->_model->newQuery()->findOrFail($userId);
    }

    public function requestPhoneVerification(string $userId): void
    {
        // TODO: Implement requestPhoneVerification() method.
    }

    public function verifyPhone(array $phoneVerificationData): void
    {
        // TODO: Implement verifyPhone() method.
    }

    public function requestMailVerification(string $userId): void
    {
        // TODO: Implement requestMailVerification() method.
    }

    public function verifyMail(array $mailVerificationData): void
    {
        // TODO: Implement verifyMail() method.
    }

    public function updateUserLocation(float $lat, float $lng, string $userId): Model
    {
        $user = $this->_model->newQuery()->findOrFail($userId);
        $user->lat = $lat;
        $user->lng = $lng;
        $user->save();
        return $user;
    }
}
