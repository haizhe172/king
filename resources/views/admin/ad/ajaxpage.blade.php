@foreach($ad as $v)
			                          <tr>
                                          <td><input name="selall[]"  type="checkbox"></td>
				                          <td>{{$v->ad_id}}</td>
									      <td attr_id="{{$v->ad_id}}">
                                            <span class="span_name">{{$v->ad_name}}</span>
                                          </td>
                                          <td attr_id="{{$v->template_id}}">
                                            <span class="span_name">{{$v->template_name}}</span>
                                          </td>
                                          <td attr_id="{{$v->position_id}}">
                                            <span class="span_name">{{$v->position_name}}</span>
                                          </td>
                                          <td attr_id="{{$v->start_time}}">
                                            <span class="span_name">{{date('Y-m-d',$v->start_time)}}</span>
                                          </td>
                                          <td attr_id="{{$v->end_time}}">
                                            <span class="span_name">{{date('Y-m-d',$v->end_time)}}</span>
                                          </td>
                                          <td attr_id="{{$v->ad_link}}">
                                            <span class="span_name">{{$v->ad_link}}</span>
                                          </td>
                                          <td attr_id="{{$v->ad_image}}">
                                            <span class="span_name">@if($v->ad_image)<img src="{{$v->ad_image}}" width="60"> @endif</span>
                                          </td>
                                          <td attr_id="{{$v->image_url}}">
                                            <span class="span_name">{{$v->image_url}}</span>
                                          </td>
                                          <td attr_id="{{$v->is_on}}">
                                            <span class="span_name">@if($v->is_on==1)开启 @elseif ($v->is_on==2)关闭 @endif</span>
                                          </td>
                                          
		                                  <td class="text-center">
		                                 	  <a href="{{url('/admin/ad/edit/'.$v->ad_id)}}" class="btn bg-olive btn-xs">修改</a>
		                                 	  <a href="javascript:;" class="btn bg-olive btn-xs" onclick="DeleteGetId({{$v->ad_id}},this)">删除</a>
											  <!-- <button class="btn btn-default" ng-click="goListPage()"><a href="#">添加广告</a></button> -->
		                                   </td>
			                          </tr>
                                      @endforeach
                                      <tr>
                                        <button type="button" class="btn bg-olive btn-xs delall">批量删除</button>
                                        <td colspan="12" align="center">{{$ad->appends(['ad_name'=>$ad_name])->links()}}</td>
                                      </tr>