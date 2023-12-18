<?php

namespace App\trait\admin;


use App\Models\content;

trait action_items
{
    public function action_items_list($action, $model, $table, $items, $order = [])
    {

        switch ($action) {
            case 'delete_all':
                return self::delete_all($model, $items, $table);
                break;
            case 'change_state':
                return self::change_state($model, $items);
                break;
            case 'change_state_main':
                return self::change_state_main($model, $items);
                break;
            case 'change_state_sell':
                return self::change_state_sell($model, $items);
                break;
            case 'change_order':
                return self::change_order($model, $items, $order);
                break;
        }


    }

    private function delete_all($model, $items, $table = true)
    {
        $model::whereIn('id', array_values($items))->delete();
        if ($table) {
            $model::whereIn('parent_id', array_values($items))->update(["parent_id" => "0"]);
        }
        return __('alert_msg.success_delete_all');
    }

    private function change_state($model, $items)
    {
        $items = $model::whereIn('id', array_values($items))->get();
        foreach ($items as $item) {
            if ($item["state"] === "0") {
                $model::find($item["id"])->update(["state" => "1"]);
            } elseif ($item["state"] === "1") {
                $model::find($item["id"])->update(["state" => "0"]);
            }
        }
        return __('alert_msg.success_change_state');
    }
    private function change_state_main($model, $items)
    {
        $items = $model::whereIn('id', array_values($items))->get();
        foreach ($items as $item) {
            if ($item["state_main"] === "0") {
                $model::find($item["id"])->update(["state_main" => "1"]);
            } elseif ($item["state_main"] === "1") {
                $model::find($item["id"])->update(["state_main" => "0"]);
            }
        }
        return __('alert_msg.success_change_state');
    }
    private function change_state_sell($model, $items)
    {
        $items = $model::whereIn('id', array_values($items))->get();
        foreach ($items as $item) {
            if ($item["state_sell"] === "0") {
                $model::find($item["id"])->update(["state_sell" => "1"]);
            } elseif ($item["state_sell"] === "1") {
                $model::find($item["id"])->update(["state_sell" => "0"]);
            }
        }
        return __('alert_msg.success_change_state');
    }

    private function change_order($model, $items, $order)
    {
        foreach ($order as $key => $value) {
            $model::find($key)->update(["order" => $value]);
        }
        return __('alert_msg.success_order');

    }
}
