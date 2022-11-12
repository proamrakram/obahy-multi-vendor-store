@foreach($data as $order)
                            <tr>
                                <td class="text-center p-2" width='50'>
                                    <div class="form-check">
                                        <input class="form-check-input" data-check-all="yes" type="checkbox" value="" id="checkbox1">
                                        <label class="form-check-label" for="checkbox1"></label>
                                    </div>
                                </td>
                                <td class="text-center p-2" width='50'>
                                    {{$order->id}}
                                </td>
                                <td class="text-center p-2">
                                  {{$order->user->name}}  
                                </td>
                                <td class="text-center p-2">
                                 {{$order->user->country->getName()}}
                                 <i class='ti ti-map-pin'></i>
                                </td>
                                <td class="text-center p-2">
                                    <span class="text-muted">{{$order->created_at}}</span>
                                </td>    
                                <td class="text-center p-2">
                                    <span class="text-muted"> DHL </span>
                                </td>
                                <td class="text-center p-2">
                                    <span class="text-muted">{{$order->total_price}}</span>
                                </td>  
                                <td class="text-center p-2">
                                    <span class="text-muted">{{$order->getStatus($order->status)}}</span>
                                </td>                                    
                                    <td class="text-end p-3">
                                    
                                    <div class="tools-options d-flex justify-content-center">
                                        @if(auth()->user()->can('orders-edit'))
                                        <a href="{{route('admin.orders.edit',['id'=>$order->id])}}"> <i class="uil uil-edit"></i> </a>
                                       @endif
                                       @if(auth()->user()->can('orders-delete'))
                                        <a href="{{route('admin.orders.delete',['id'=>$order->id])}}"  onclick="return confirm('هل انت متأكد من حذف ({{$order->order_number}})?')" > <i class="uil uil-trash-alt"></i> </a>
                                    @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach

							