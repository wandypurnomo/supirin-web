<?php


namespace App\Contracts;


use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface UserRepositoryContract
{
    public function register(array $data): Model;

    public function login(array $data, string $guard = 'user');

    public function logout(string $guard = 'user'): void;

    public function profile(string $userId): Model;

    public function setActiveStatus(string $userId, int $status): Model;

    public function setDataVerificationStatus(string $userId, bool $asActive = true): Model;

    public function all(Request $request, int $perPage = 10): LengthAwarePaginator;

    public function find(string $userId): Model;

    public function requestPhoneVerification(string $userId): void;

    public function verifyPhone(array $phoneVerificationData): void;

    public function requestMailVerification(string $userId): void;

    public function verifyMail(array $mailVerificationData): void;

    public function updateUserLocation(float $lat, float $lng, string $userId): Model;
}
