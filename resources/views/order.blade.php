
                        <p>Hi&nbsp; {{$name}} , thank you for your order!<br /><br /><br /></p>
                        <p>Your order has been received and delivery should be made within 5-7 days.</p>
                        <p>If you have any questions, you can&nbsp;email us at <a href="mailto:whysoseriosu245@gmail.com">whysoserious245@gmail.com</a>.</p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p>Order # {{$order->id}} </p>
                        <p>&nbsp;</p>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Unit Price</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cart->items as $key => $item)
                                        <tr>
                                            <td>{{$item['name']}}<strong> × {{$item['quantity']}}</strong></td>
                                            <td>{{number_format($item['price'])}}</td>
                                            <td>{{number_format($item['price']*$item['quantity'])}} đ</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="order_total">
                                            <th>Order Total</th>
                                            <td></td>
                                            <td><strong>{{number_format($cart->total_price)}} đ</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <p><br /><span style="color: #000000;">Techy Customer Support</span><br /><br /><strong>Copyright &copy;&nbsp;<span class="il">Techy</span>. All rights reserved.</strong></p>
<p>&nbsp;</p>