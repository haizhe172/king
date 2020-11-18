<form method="post" action="{{url('/admin/goods/product')}}" name="addForm" id="addForm">
@csrf
        <input type="hidden" name="goods_id" value="">
        <input type="hidden" name="act" value="product_add_execute">
        <div class="box-footer clearfix">
        <table width="100%" cellpadding="3" cellspacing="1" id="table_list">
            <tbody><tr>
                <th colspan="20" scope="col">商品名称：{{$goods->goods_name}}&nbsp;&nbsp;&nbsp;&nbsp;货号：{{$goods->goods_sn}}</th>
                <input type="hidden" name="goods_id" value="{{$goods->goods_id}}">
            </tr>
            <tr>
                <!-- start for specifications -->
                <!-- @ph @endphp -->
                @if($new_goods_specs['attr_name'])
                    @foreach($new_goods_specs['attr_name'] as $k=>$v)
                        <td scope="col" style="background-color: rgb(255, 255, 255);"><div align="center"><strong>{{$v}}</strong></div></td>
                        @endforeach
                        @endif
                                <!-- end for specifications -->
                        <td class="label_2" style="background-color: rgb(255, 255, 255);"><div align="center"><strong>货号</strong></div></td>
                        <td class="label_2" style="background-color: rgb(255, 255, 255);"><div align="center"><strong>库存</strong></div></td>
                        <td class="label_2" style="background-color: rgb(255, 255, 255);">&nbsp;</td>
            </tr>
            <tr id="attr_row">
                @if($new_goods_specs['attr_values'])
                @foreach($new_goods_specs['attr_values'] as $k=>$v)
                <!-- start for specifications_value -->
                <td align="center" style="background-color: rgb(255, 255, 255);">

                            <select name="attr[{{$k}}][]">
                                <option value="" selected="">请选择...</option>
                                @foreach($v as $kk=>$vv)
                                    <option value="{{$kk}}">{{$vv}}</option>
                                @endforeach
                            </select>

                </td>
                @endforeach
                @endif
                <!-- end for specifications_value -->

                <td class="label_2" style="background-color: rgb(255, 255, 255);" align="center"><input type="text" class="form-control" name="product_sn[]" style="width:200px;" value="" size="20"></td>
                <td class="label_2" style="background-color: rgb(255, 255, 255);" align="center"><input type="text" class="form-control" name="product_number[]" style="width:50px;" value="1" size="10"></td>
                <td style="background-color: rgb(255, 255, 255);" align="center"><input type="button" class="button" value=" + " onclick="javascript:add_attr_product(this);"></td>
            </tr>

            <tr>

                <td align="center" colspan="5" style="background-color: rgb(255, 255, 255);">
                    <input type="submit" class="pull-right btn btn-default" value=" 保存 " onclick="checkgood_sn()">
                </td>
            </tr>
            </tbody></table>
            </div>
    </form>

    </div>

    </body>
    <script src="/admin/js/jquery.js"></script>
    <script>
        function add_attr_product(obj){
            var newobj = $(obj).parent().parent().clone();
            newobj.find('.button').val(' - ');
            newobj.find('.button').attr('onclick','decr_attr_product(this)');
            $(obj).parent().parent().after(newobj);
        }
        function decr_attr_product(obj){
            $(obj).parent().parent().remove();
        }
    </script>