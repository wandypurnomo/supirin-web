<?php


namespace App\Contracts;


use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface OrderRepositoryContract
{
    public function all(Request $request, int $perPage = 10): LengthAwarePaginator;

    public function createOrder(array $data): Model;

    public function find(string $orderId): Model;

    public function findByCode(string $orderCode): Model;

    public function setOrderStatus(int $status, Model $order): Model;

    public function deleteOrder(Model $order): void;
}
