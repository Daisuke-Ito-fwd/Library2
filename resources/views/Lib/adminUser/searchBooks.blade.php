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
<transition name="bm">
    <delete-books-modal v-show="deleteContent" v-on:from-child="closeModal" v-on:delete-end="deleteEnd">
        @component('components.modal.deleteBooksModal')
        @endcomponent
    </delete-books-modal>
</transition>
<transition name='bem' mode="out-in">
    <edit-book-modal v-show="editContent" v-on:from-child="closeModal" v-on:edit-conf="showEditConf">
        @component('components.modal.editBookModal')
        @endcomponent
    </edit-book-modal>
</transition>
<transition name='becm' mode="out-in">
    <edit-conf-book-modal v-show="editConfContent" v-on:re-edit="reEdit" v-on:edit-update="editUpdate">
        @component('components.modal.editConfBookModal')
        @endcomponent
    </edit-conf-book-modal>
</transition>
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