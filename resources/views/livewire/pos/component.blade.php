<div>
    <style>
    
    </style>


    <div class="row layout-top-spacing">

    <div class="col-sm-12 col-md-12">
        <!--total-->
        @include('livewire.pos.partials.total')
        </div>

        <div class="col-sm-12 col-md-9">
        <!--detalles-->
        @include('livewire.pos.partials.detail')
        </div>
        
        <div class="col-sm-12 col-md-3">
        <!--coins-->
        @include('livewire.pos.partials.coins')
        
        </div>

       
        

    </div>
</div>
<script src="{{'js/keypress.js'}}"></script>
<script src="{{'js/onscan.js'}}"></script>

@include('livewire.pos.scripts.shortcuts')
@include('livewire.pos.scripts.events')
@include('livewire.pos.scripts.general')
@include('livewire.pos.scripts.scan')