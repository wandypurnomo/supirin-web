<?php


namespace app\Contracts;


use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface DriverRepositoryContract
{
    public function updateProfile(array $driverData, Model $driver): Model;

    public function addAttachment(array $data, Model $driver): Model;

    public function updateAttachment(array $data, string $attachmentId, Model $driver): Model;

    public function deleteAttachment(string $attachmentId, Model $driver): void;

    public function takeOrder(string $orderId): Model;

    public function rejectOrder(string $orderId, array $reason): Model;

    public function allOrderByDriver(Request $request, string $driverId, int $perPage = 10): LengthAwarePaginator;

    public function reviewOfDriver(Model $driver, int $perPage = 10): LengthAwarePaginator;

    public function setAvailabilityStatus(int $status, Model $driver): Model;

    public function ensureDriver(Model $driver): bool;

    public function isDriverAvailable(Model $driver): bool;
}
