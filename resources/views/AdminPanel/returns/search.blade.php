<!-- Start -->
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
                                       {{$order->product->getName()}}
                                    </td>
                                    <td class="text-center p-2">
                                    {{$order->user->name}}
                                    </td>
                                    <td class="text-center p-2">
                                        <span class="text-muted">{{$order->reference_date}}</span>
                                    </td>
                                    <td class="text-center p-2">
                                        <span class="text-muted">{{exchange($order->store->store_currency ,$order->price)*$order->amount}}</span>
                                    </td>    
                                                                     
                                 
                                </tr>
                                @endforeach
                                <!-- End -->
