<table width="90%" class="table" style="margin-left: 10%">
    <tbody>
<tr>
        <td>
            <table width="50%">
                <tbody>
                @foreach($attr as $v)
                        <!-- 属性 : 下拉框-->
                @if($v->attr_type == 0 && $v->attr_input_type == 1)
                    @php $attr_values = explode("\r\n",$v->attr_values);@endphp
                <tr>
                    <td class="label"><span style="color:black;font-size:14px;">{{$v->attr_name}}</span></td>
                    <td><input type="hidden" name="attr_id_list[]" value="{{$v->attr_id}}">
                        <select name="attr_value_list[]">
                            <option value="">请选择...</option>
                            @foreach($attr_values as $vv)
                            <option value="{{$vv}}">{{$vv}}</option>
                                @endforeach
                        </select>
                        <input type="hidden" name="attr_price_list[]" value="0">
                    </td>
                </tr>
                @endif
                        <!-- 属性 : 手动录入-->
                @if($v->attr_type == 0 && $v->attr_input_type == 0)
                <tr>
                    <td class="label"><span style="color:black;font-size:14px;">{{$v->attr_name}}</span></td>
                    <td>
                        <input type="hidden" name="attr_id_list[]" value="{{$v->attr_id}}">
                        <input name="attr_value_list[]" type="text" value="" size="40">
                        <input type="hidden" name="attr_price_list[]" value="0">
                    </td>
                </tr>
                @endif
                        <!-- 规格 : 手动录入-->
                @if($v->attr_type == 1 && $v->attr_input_type == 0)
                <tr>
                    <td class="label"><a href="javascript:;" onclick="addSpec(this)">[+]</a><span style="color:black;font-size:14px;">{{$v->attr_name}}</span></td>
                    <td>

                        <input type="hidden" name="attr_id_list[]" value="{{$v->attr_id}}">
                        <input name="attr_value_list[]" type="text" value="" size="40"> 属性价格
                        <input type="text" name="attr_price_list[]" value="" size="5">
                    </td>
                </tr>
                @endif
                        <!-- 规格 : 下拉框-->
                @if($v->attr_type == 1 && $v->attr_input_type == 1)
                    @php $attr_values = explode("\r\n",$v->attr_values);@endphp
                <tr>
                    <td class="label">
                        <a href="javascript:;" onclick="addSpec(this)">[+]</a><span style="color:black;font-size:14px;">{{$v->attr_name}}</span>
                    </td>
                    <td><input type="hidden" name="attr_id_list[]" value="{{$v->attr_id}}" >
                        <select name="attr_value_list[]">
                            <option value="">请选择...</option>
                            @foreach($attr_values as $vv)
                                <option value="{{$vv}}">{{$vv}}</option>
                            @endforeach
                        </select>

                    </td>
                    <td><div class="input-group">
                        <span class="input-group-addon">属性价格</span>
                        <input type="text" class="form-control" name="attr_price_list[]" value="">
                </div></td>
                </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </td>
    </tr>
    </tbody></table>
