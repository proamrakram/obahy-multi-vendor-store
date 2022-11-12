   <!-- Start -->
   @foreach($data as $order)
   
                                <!-- Start -->
                                <tr>
                                    <td class="text-center p-2" width='50'>
                                        <span class="text-muted">{{$order->id}} </span>
                                    </td>
                                    <td class="text-center p-2">
                                        <span class="text-muted">{{\App\Models\Product::find($order->product_id)->getName()}} </span>
                                    </td>
                                    <td class="text-center p-2">
                                        <span class="text-muted">{{$order->total}} </span>
                                    </td>
                                    <td class="text-center p-2">
                                        <span class="text-muted"> {{$order->price}}</span>
                                    </td>
                                    <td class="text-center p-2">
                                        <span class="text-muted"> {{$order->price}}</span>
                                    </td>    
                                </tr>
                                <!-- End -->

                                @endforeach