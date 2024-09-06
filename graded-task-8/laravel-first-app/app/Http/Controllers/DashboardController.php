<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Contact;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    private static $models = [
        'users' => User::class,
        'contacts' => Contact::class,
        'products' => Product::class
    ];
    public function coordinator()
    {
        $model = \request('model');
        if ($model == 'users') {
            $res = self::users();
        }else if ($model == 'contacts') {
            $res = self::contacts();
        }else if($model == 'products'){
            $res = self::products();
        }else{
            return redirect('/dashboard?model=users');
        }
        $data = $res['data'];
        $cols = $res['cols'];
        return view('admin.dashboard',compact('data', 'cols', 'model'));

    }
    public static function users()
    {
        $data = User::query()
            ->with('image')
            ->orderBy('id','DESC')
            ->paginate(10);
//            ->get();
        $data=UserResource::collection($data);
        $cols = User::getTableColumns();
        return ['data' => $data, 'cols' => $cols];
    }

    public static function contacts()
    {
        $data = Contact::query()
            ->orderBy('id','DESC')
            ->paginate(10);
        $cols = Contact::getTableColumns();
        return ['data' => $data, 'cols' => $cols];
    }

    public static function products()
    {
        $data = Product::query()
            ->with('images')
            ->orderBy('id','DESC')
            ->paginate(10);
        $cols = Product::getTableColumns();
        return ['data' => $data, 'cols' => $cols];
    }

    public static function update()
    {
        $model = \request('model');
        $ModelClass = self::$models[$model];
        $id = \request('id');
        if ($ModelClass) {
            $cols = $ModelClass::getInputColumns();
        }else{
            redirect('/dashboard?model=users');
        }
        $item = $ModelClass::find($id);
        return view('admin.update-item', compact('model', 'id', 'cols', 'item'));
    }

    public static function update_item()
    {
        $model = self::$models[\request('model')];
        $id = request('id');
        $item = $model::find($id);
        $item->update(request()->all());
        return redirect()->back()->with('success', 'Item updated successfully');
    }
}
