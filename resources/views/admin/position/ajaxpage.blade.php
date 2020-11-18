@foreach($position as $v)
			                          <tr>
                                          <td><input name="selall[]"  type="checkbox" value="{{$v->position_id}}"></td>
				                          <td>{{$v->position_id}}</td>
									      <td attr_id="{{$v->position_id}}">
                                            <span class="span_name">{{$v->position_name}}</span>
                                          </td>
                                          <td attr_id="{{$v->position_width}}">
                                            <span class="span_name">{{$v->position_width}}</span>
                                          </td>
                                          <td attr_id="{{$v->position_height}}">
                                            <span class="span_name">{{$v->position_height}}</span>
                                          </td>
                                          <td attr_id="{{$v->position_desc}}">
                                            <span class="span_name">{{$v->position_desc}}</span>
                                          </td>
                                          <td attr_id="{{$v->template}}">
                                            <span class="span_name">@if($v->template_id==1)图片 @elseif ($v->template_id==2)文字 @endif</span>
                                          </td>
		                                  <td class="text-center">
		                                 	  <a href="/admin/position/edit?id={{$v->position_id}}" class="btn bg-olive btn-xs">修改</a>
		                                 	  <a href="javascript:;" class="btn bg-olive btn-xs" onclick="DeleteGetId({{$v->position_id}},this)">删除</a>
											  <!-- <button class="btn btn-default" ng-click="goListPage()"><a href="#">添加广告</a></button> -->
                                              <a href="/admin/position/show?id={{$v->position_id}}" class="btn bg-olive btn-xs">查看广告</a>
                                              <a href="/admin/position/make?id={{$v->position_id}}" class="btn bg-olive btn-xs">生成广告</a>
		                                   </td>
			                          </tr>
                                      @endforeach
                                      <tr>
                                        <button type="button" class="btn bg-olive btn-xs delall">批量删除</button>
                                        <td colspan="8" align="center">{{$position->appends(['position_name'=>$position_name])->links()}}</td>
                                      </tr>