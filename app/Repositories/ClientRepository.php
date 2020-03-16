<?php


namespace App\Repositories;


use app\Contracts\ClientRepositoryContract;
use App\Models\Order;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ClientRepository implements ClientRepositoryContract
{
    private $_model;
    private $_orderModel;

    public function __construct(User $_model,Order $_orderModel)
    {
        $this->_model = $_model;
        $this->_orderModel = $_orderModel;
    }

    public function allAvailableDriver(Request $request, int $perPage = 10): LengthAwarePaginator
    {
        $query = $this->_model->newQuery();
        $query->latest();
        return $query->paginate($perPage);
    }

    public function allAvailableDriverInRadius(float $clientLat, float $clientLng, int $radius = 5): LengthAwarePaginator
    {
        $query = $this->_model::geofence($clientLat, $clientLng, 0, $radius);
        $query->orderBy("distance", "ASC");
        return $query->get();
    }

    public function allOrderByClient(Request $request, Model $client, int $perPage = 10): LengthAwarePaginator
    {
        $query = $client->clientOrders();
        $where = function (Builder $builder) use ($request) {

        };
        $query->where($where);
        return $query->paginate($perPage);
    }

    public function updateProfile(array $userData, Model $client): Model
    {
        $client->update($userData);
        return $client;
    }

    public function acceptOrder(string $orderId): Model
    {
        // TODO: Implement acceptOrder() method.
    }

    public function cancelOrder(string $orderId, array $reason): Model
    {
        // TODO: Implement cancelOrder() method.
    }

    public function finishOrder(string $orderId): Model
    {
        // TODO: Implement finishOrder() method.
    }

    public function writeReviewToOrder(string $orderId, array $review): Model
    {
        // TODO: Implement writeReviewToOrder() method.
    }
}
