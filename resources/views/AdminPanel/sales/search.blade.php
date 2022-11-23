   <!-- Start -->
   @foreach($data as $store)
                                <tr>
                                    <td class="text-center p-2" width='50'>
                                        <span class="text-muted">1 </span>
                                    </td>
                                    <td class="text-center p-2">
                                        <span class="text-muted"> {{$store->getName()}} </span>
                                    </td>
                                    <td class="text-center p-2">
                                        <span class="text-muted"> @if(!is_null($store->package)){{$store->package->getName()}} @else -- @endif </span>
                                    </td>
                                    <td class="text-center p-2">
                                        <span class="text-muted"> {{$store->country->getName()}} </span>
                                    </td>
                                    <td class="text-center p-2">
                                        <span class="text-muted"> {{$store->city->getName()}}</span>
                                    </td>    
                                    <td class="text-center p-2">
                                        <span class="text-muted"> {{$store->order_products()->where('is_delete',0)->where('status','delivered')->sum('amount')}}</span>
                                    </td>    
                                    <td class="text-center p-2">
                                        <span class="text-muted"> {{exchange($store->store_currency ,$store->order_products()->where('is_delete',0)->where('status','delivered')->sum(\DB::raw('price*amount')))}}</span>
                                    </td>    
                                </tr>
                                @endforeach
                                <!-- End -->

                                