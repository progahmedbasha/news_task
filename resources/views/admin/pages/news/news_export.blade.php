<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                
                                                <th><b>ID</b></th>
                                                <th><b>Title</b></th>
                                                <th><b>Date</b></th>
                                                <th><b>Publishers</b></th>
                                                <th><b>Status</b></th>
                                              
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                           @foreach($news as $item)
                                              <tr>
                                            
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->title}}</td>
                                            <td>{{$item->publish_date}}</td>
                                            <td>{{$item->User->name}}</td>
                                           
                                            @if($item->active == 1)
                                                <td>Active</td>
                                            @else
                                                <td>Deactive</td>
                                           
                                            @endif

                                           
                                              
                                              </tr>
                                            @endforeach
                                        </tbody>
                                    
                                         <tfoot>
                                            <tr>
                                                <th></th>
                                               
                                               
                                            </tr>
                                        </tfoot>
                                    </table>

