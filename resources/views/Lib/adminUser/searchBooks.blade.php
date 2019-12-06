@extends('layouts.base')

@section('title', '書籍検索')
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

@section('logID')
@section('box1')
@if ($user->typ  == 1)
    <delete-books-modal v-show="deleteContent" v-on:from-child="closeModal" v-on:delete-end="deleteEnd">
        @component('components.modal.deleteBooksModal')
        @endcomponent
    </delete-books-modal>
    <edit-book-modal v-show="editContent" v-on:from-child="closeModal" v-on:edit-conf="showEditConf">
        @component('components.modal.editBookModal')
        @endcomponent
    </edit-book-modal>
    <edit-conf-book-modal v-show="editConfContent" v-on:re-edit="reEdit" v-on:edit-update="editUpdate">
        @component('components.modal.editConfBookModal')
        @endcomponent
    </edit-conf-book-modal>
    @endif
    @component('components.searchBook')
    @endcomponent
@endsection

@section('box2')

    @component('components.resultBooks')
    @slot('typ')
            {{ $user->typ }}
        @endslot
    @endcomponent
@endsection

@section('footerL')
    
@endsection

@section('footerR')
    
@endsection