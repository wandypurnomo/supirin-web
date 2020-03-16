<?php


namespace app\Contracts;


use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface ClientRepositoryContract
{
    public function allAvailableDriver(Request $request, int $perPage = 10): LengthAwarePaginator;

    public function allAvailableDriverInRadius(float $clientLat, float $clientLng, int $radius = 5): LengthAwarePaginator;

    public function allOrderByClient(Request $request, Model $client, int $perPage = 10): LengthAwarePaginator;

    public function updateProfile(array $userData, Model $client): Model;

    public function acceptOrder(string $orderId): Model;

    public function cancelOrder(string $orderId, array $reason): Model;

    public function finishOrder(string $orderId): Model;

    public function writeReviewToOrder(string $orderId, array $review): Model;
}
