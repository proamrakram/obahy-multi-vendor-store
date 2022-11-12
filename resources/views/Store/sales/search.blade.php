   <!-- Start -->
   @foreach($data as $order)
   
                                <!-- Start -->
                                <tr>
                                    <td class="text-center p-2" width='50'>
                                        <span class="text-muted">{{$order->id}} </span>
                                    </td>
                                    <td class="text-center p-2">
                                        <span class="text-muted">{{$order->id}} </span>
                                    </td>
                                    <td class="text-center p-2">
                                        <span class="text-muted"> {{$order->products()->where('store_id',auth()->user()->store_id)->where('status','delivered')->where('is_delete',0)->sum('amount')}} </span>
                                    </td>
                                    <td class="text-center p-2">
                                        <span class="text-muted"> {{$order->products()->where('store_id',auth()->user()->store_id)->where('status','delivered')->where('is_delete',0)->sum(\DB::raw('price*amount'))}}</span>
                                    </td>
                                    <td class="text-center p-2">
                                        <span class="text-muted"> {{$order->products()->where('store_id',auth()->user()->store_id)->where('status','delivered')->where('is_delete',0)->sum(\DB::raw('price*amount'))}}</span>
                                    </td>    
                                </tr>
                                <!-- End -->

                                @endforeach