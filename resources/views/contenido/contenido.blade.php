@extends('layouts.principal')

@section('contenido')
<main class="main">

    @include('layouts.header')

    <div class="container-fluid">
        <template v-if="menu==0">
            <div>
                <contenido></contenido>
            </div>
        </template>

        <template v-if="menu==1">
            <div>
                <categoria></categoria>
            </div>
        </template>

        <template v-if="menu==2">
            <div>
                2
            </div>
        </template>

        <template v-if="menu==3">
            <div>
                3
            </div>
        </template>

        <template v-if="menu==4">
            <div>
                4
            </div>
        </template>

        <template v-if="menu==5">
            <div>
                5
            </div>
        </template>

        <template v-if="menu==6">
            <div>
                6
            </div>
        </template>

        <template v-if="menu==7">
            <div>
                7
            </div>
        </template>

        <template v-if="menu==8">
            <div>
                8
            </div>
        </template>
    </div>
</main>

@endsection
