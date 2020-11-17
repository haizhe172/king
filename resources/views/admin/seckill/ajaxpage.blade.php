@foreach($seckill as $v)
			                          <tr>
                                          <td><input name="selall[]"  type="checkbox"></td>
				                          <td>{{$v->seckill_id}}</td>
									      <td attr_id="{{$v->seckill_name}}">
                                            <span class="span_name">{{$v->seckill_name}}</span>
                                          </td>
                                          <td attr_id="{{$v->goods_id}}">
                                            <span class="span_name">{{$v->goods_name}}</span>
                                          </td>
                                          <td attr_id="{{$v->goods_num}}">
                                            <span class="span_name">{{$v->goods_num}}</span>
                                          </td>
                                          <td attr_id="{{$v->start_time}}">
                                            <span class="span_name">{{date('Y-m-d',$v->start_time)}}</span>
                                          </td>
                                          <td attr_id="{{$v->end_time}}">
                                            <span class="span_name">{{date('Y-m-d',$v->end_time)}}</span>
                                          </td>
                                          <td attr_id="{{$v->create_time}}">
                                            <span class="span_name">{{date('Y-m-d',$v->create_time)}}</span>
                                          </td>
                                          <td attr_id="{{$v->seckill_desc}}">
                                            <span class="span_name">{{$v->seckill_desc}}</span>
                                          </td>
                                          <td attr_id="{{$v->is_on}}">
                                            <span class="span_name">@if($v->is_on==1)开启 @elseif ($v->is_on==2)关闭 @endif</span>
                                          </td>
                                          
		                                  <td class="text-center">
		                                 	  <a href="{{url('/admin/seckill/edit/'.$v->seckill_id)}}" class="btn bg-olive btn-xs">修改</a>
		                                 	  <a href="javascript:;" class="btn bg-olive btn-xs" onclick="DeleteGetId({{$v->seckill_id}},this)">删除</a>
											  <!-- <button class="btn btn-default" ng-click="goListPage()"><a href="#">添加广告</a></button> -->
		                                   </td>
			                          </tr>
                                      @endforeach
                                      <tr>
                                        <button type="button" class="btn bg-olive btn-xs delall">批量删除</button>
                                        <td colspan="12" align="center">{{$seckill->links()}}</td>
                                      </tr>