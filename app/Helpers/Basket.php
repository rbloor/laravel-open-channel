<?php

namespace App\Helpers;

class Basket
{
    public function add(array $item): void
    {
        $basket = $this->get();

        $index = array_search($item['id'], array_column($basket, 'id'));

        if (false !== $index) {
            $basket[$index]['quantity'] += $item['quantity'];
            $this->set($basket);
            return;
        }

        array_push($basket, $item);
        $this->set($basket);
    }

    public function update(array $item): void
    {
        $basket = $this->get();

        $index = array_search($item['id'], array_column($basket, 'id'));

        if ($index !== false) {
            $basket[$index]['quantity'] = $item['quantity'];
            $this->set($basket);
            return;
        }
    }

    public function remove(int $reward_id): void
    {
        $basket = $this->get();
        array_splice($basket, array_search($reward_id, array_column($basket, 'id')), 1);
        $this->set($basket);
    }

    public function clear(): void
    {
        $this->set([]);
    }

    public function get(): array
    {
        return request()->session()->get('basket') ?? [];
    }

    public function set(array $basket): void
    {
        request()->session()->put('basket', $basket);
    }

    public function total(): int
    {
        return collect($this->get())->sum(function ($item) {
            return $item['points'] * $item['quantity'];
        });
    }
}
