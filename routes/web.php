<?php

route::pattern('id','([0-9]*)'); //là một hàm chứa biểu thức chính quy dùng cho tất cả.
route::pattern('slug','.*');

Route::group(['namespace' => 'LayoutController'], function () {
    Route::get('/', [
        'uses' => 'IndexController@index',
        'as'   => 'public.index'
    ]);
    //---- products --------
    Route::group(['prefix' => 'product'], function () {
        Route::get('/',[
            'uses'  => 'ProductController@index',
            'as'    => 'public.products'
        ]);
        Route::get('/detail-product',[
            'uses'  => 'ProductController@product_detail',
            'as'    => 'public.product_detail'
        ]);
    });
    Route::group(['prefix' => 'order'], function () {
        Route::get('shopping-card',[
            'uses'  => 'OrderController@shoppingcard',
            'as'    => 'public.shoppingcard'
        ]);
        Route::get('/checkout',[
            'uses'  => 'OrderController@checkout',
            'as'    => 'public.checkout'
        ]);

    });
    Route::group(['prefix' => 'contact'], function () {
        Route::get('',[
            'uses'  => 'ContactController@index',
            'as'    => 'public.contact'
        ]);
    });
    Route::group(['prefix' => 'login'], function () {
        Route::get('dang-nhap',[
            'uses'  => 'UserController@login',
            'as'    => 'public.login'
        ]);
    });
    
});




//-----------------------------------------------------------------
//Quản lý Dashboard.
Route::group(['namespace' => 'AdminController','prefix' => 'adminpc', 'middleware'=>'auth'], function () {
    Route::get('/',[
        'uses'  => 'IndexController@index',
        'as'    => 'admin.index'
    ]);
    Route::get('/index',[
        'uses'  => 'IndexController@index',
        'as'    => 'admin.index'
    ]);
    //quản lý product...
    Route::group(['prefix' => 'Product'], function () {
        Route::get('/',[
            'uses'  => 'ProductController@index',
            'as'    => 'admin.listproduct'
        ]);
        Route::get('/Chon-danh-muc',[
            'uses'  => 'ProductController@create',
            'as'    => 'admin.cate.add.product'
        ]);
        Route::post('/nhap-them-san-pham-{id}',[
            'uses'  => 'ProductController@createAdd',
            'as'    => 'admin.add.product'
        ]);
        Route::get('/chinh-sua-san-pham',[
            'uses'  => 'ProductController@edit',
            'as'    => 'admin.edit.product'
        ]);
    });
    Route::group(['prefix' => 'Category'], function () {
        Route::get('',[
            'uses'  => 'CateController@index',
            'as'    => 'admin.category'
        ]);
        Route::post('store-category',[
            'uses'  => 'CateController@store',
            'as'    => 'admin.storeCate'
        ]);
        Route::get('edit-{slug}-{id}',[
            'uses'  => 'CateController@edit',
            'as'    => 'admin.cateEdit'
        ]);
        
        Route::post('update-{slug}-{id}',[
            'uses'  => 'CateController@update',
            'as'    => 'admin.updateCate'
        ]);
        Route::get('delete-{id}',[
            'uses'  => 'CateController@destroy',
            'as'    => 'admin.deleteCate'
        ]);

    });

    Route::group(['prefix' => 'order'], function () {
        Route::get('/quan-ly-hoa-don',[
            'uses'  => 'OrdermanageController@show',
            'as'    => 'admin.qlhoadon'
        ]);
        Route::get('/Nhap-don-hang',[
            'uses'  => 'OrdermanageController@NhapDH',
            'as'    => 'admin.OrderIn'
        ]);
        Route::get('/chi-tiet-hoa-don',[
            'uses'  => 'OrdermanageController@detaiOrder',
            'as'    => 'admin.detaiOrder'
        ]);
    });
    Route::group(['prefix' => 'comment'], function () {
        Route::get('',[
            'uses'  => 'CommentController@index',
            'as'    => 'admin.comment'
        ]);
    });
    Route::group(['prefix' => 'parameters'], function () {
        Route::get('',[
            'uses'  => 'ParameterController@index',
            'as'    => 'admin.parameter'
        ]);
        Route::get('/edit',[
            'uses'  => 'ParameterController@edit',
            'as'    => 'admin.editparameter'

        ]);
    });
    Route::group(['prefix' => 'User'], function () {
        Route::get('',[
            'uses'  => 'UsersController@index',
            'as'    => 'admin.users'
        ]);
        Route::get('/user-add',[
            'uses'  => 'UsersController@create',
            'as'    => 'admin.usersCreate'
        ]);

        Route::post('store-user',[
            'uses'  => 'UsersController@store',
            'as'    => 'admin.user.store'
        ]);

        Route::get('edit-{slug}-{id}',[
            'uses'  => 'UsersController@edit',
            'as'    => 'admin.user.edit'
        ]);

        Route::post('update-{id}',[
            'uses'  => 'UsersController@update',
            'as'    => 'admin.user.update'
        ]);

        Route::get('delete-{id}',[
            'uses'  => 'UsersController@destroy',
            'as'    => 'admin.user.delete'
        ]);
        //-----------------------------------
        Route::get('/user-permission',[
            'uses'  => 'PermissionController@index',
            'as'    => 'admin.userPermission'
        ]);

        Route::post('/permission-store',[
            'uses'  => 'PermissionController@store',
            'as'    => 'admin.permission.store'
        ]);

        Route::post('/permission-update',[
            'uses'  => 'PermissionController@update',
            'as'    => 'admin.permission.update'
        ]);

        Route::post('/set-permission',[
            'uses'  => 'PermissionController@setPermission',
            'as'    => 'admin.permission.set'
        ]);
        
        Route::get('/permission-destroy-{id}',[
            'uses'  => 'PermissionController@destroy',
            'as'    => 'admin.permission.destroy'
        ]);
    });



});
route::group(['prefix'=> 'adminpc', 'namespace'=> 'Auth'], function(){

    route::get('',[
        'uses'  => 'AuthController@login',
        'as'    => 'admin.login'
    ]);
    route::post('post-login',[
        'uses'  => 'AuthController@postLogin',
        'as'    => 'admin.postlogin'
    ]);
    Route::get('logout',[
        'uses'  => 'AuthController@logout',
        'as'    => 'admin.logout'
    ]);
});