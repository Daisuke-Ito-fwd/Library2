@extends('layouts.base')

@section('title', 'searchUser')
@section('header')
    @component('components.header')
    @slot('typ')
        @if ($user->typ  == 1)
        ： 管理者
        @elseif($user->typ  == 0)
        ：administ
        @endif
    @endslot
        @slot('email')
        {{ $user->email }}
        @endslot
    @endcomponent
@endsection
@section('userModal')
    <delete-modal v-show="showContent" v-on:from-child="closeModal" v-on:delete-end="deleteEnd">
        {{-- slot使用 子の中身になる --}}
        @component('components.modal.deleteUsersModal')
            
        @endcomponent
    </delete-modal>
    <edit-modal v-show="editShowContent" v-on:from-child="closeModal" v-on:edit-conf="showEditConf">
        @component('components.modal.editUsersModal')
            
        @endcomponent
    </edit-modal>
    <edit-conf-modal v-show="editConfShowContent" v-on:from-child="closeModal" v-on:edit-update="updateUser" v-on:re-edit="reEdit">
        @component('components.modal.editConfUsersModal')
            
        @endcomponent
    </edit-conf-modal>
@endsection

@section('userBox1')
    <h3>ユーザー検索</h3>
    <p class='message'> 
                        登録ユーザーを全て表示する場合は、<u>全て空欄のまま</u>検索ボタンを押してください。
    </p>
@endsection
@section('userBox2')
    @component('components.searchUser')
    
    @endcomponent
    @component('components.ajaxResultUser')
        
    @endcomponent
@endsection

@section('footerL')
    
@endsection

@section('footerR')
    
@endsection