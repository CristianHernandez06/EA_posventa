<div wire:ignore.self id="modal-details" class="modal fade" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white"><b>Detalle de ventas</b></h5>
                <button class="close" data-dismiss="modal" type="button" aria-label="Close">
                    <span class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mt-1">
                        <thead class="text-white" style="background: #000000">
                            <tr>
                                <th class="table-th text-center text-white">PRODUCTO</th>
                                <th class="table-th text-center text-white">CANT</th>
                                <th class="table-th text-center text-white">PRECIO</th>
                                <th class="table-th text-center text-white">IMPORTE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($details as $d)
                                <tr>
                                    <td class="text-center"><h6>{{$d->product}}</h6></td>
                                    <td class="text-center"><h6>{{number_format($d->quantity,0)}}</h6></td>
                                    <td class="text-center"><h6>${{number_format($d->price,0)}}</h6></td>
                                    <td class="text-center"><h6>${{number_format($d->quantity * $d->price,0)}}</h6></td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <td class="text-center"><h6 class="text-info">TOTALES:</h6></td>
                            <td class="text-center">
                                @if ($details)
                                    <h6 class="text-info">{{$details->sum('quantity')}}</h6>
                                @endif
                            </td>
                            @if ($details)
                                @php $mytotal =0; @endphp
                                @foreach ($details as $d)
                                    @php $mytotal += $d->quantity * $d->price; @endphp
                                @endforeach
                                <td></td>
                                <td class="text-center"><h6 class="text-info">${{number_format($mytotal,0)}}</h6></td>
                            @endif
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>