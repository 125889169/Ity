(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-2132bd36"],{"1c50":function(t,e,i){},"277f":function(t,e,i){"use strict";i.d(e,"d",(function(){return o})),i.d(e,"c",(function(){return a})),i.d(e,"b",(function(){return s})),i.d(e,"g",(function(){return r})),i.d(e,"f",(function(){return l})),i.d(e,"e",(function(){return c})),i.d(e,"a",(function(){return d}));var n=i("b775");function o(t){return Object(n["a"])({url:"/notifications",method:"post",data:t})}function a(t){return Object(n["a"])({url:"/notification",method:"post",data:t})}function s(t){return Object(n["a"])({url:"/notification/allRead",method:"post",data:t})}function r(t){return Object(n["a"])({url:"/notification/unReadCount",method:"post",data:t})}function l(t){return Object(n["a"])({url:"/notification/send",method:"post",data:t})}function c(t){return Object(n["a"])({url:"/notification/read",method:"post",data:t})}function d(t){return Object(n["a"])({url:"/notification/admins",method:"post",data:t})}},"642e":function(t,e,i){"use strict";var n=i("1c50"),o=i.n(n);o.a},8256:function(t,e,i){"use strict";var n=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"tinymce-container",class:{fullscreen:t.fullscreen},style:{width:t.containerWidth}},[i("textarea",{staticClass:"tinymce-textarea",attrs:{id:t.tinymceId}}),t._v(" "),t.editorImage?i("div",{staticClass:"editor-custom-btn-container"},[i("editorImage",{staticClass:"editor-upload-btn",attrs:{color:"#1890ff"},on:{successCBK:t.imageSuccessCBK}})],1):t._e()])},o=[],a=(i("4160"),i("a9e3"),i("b680"),i("159b"),function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"upload-container"},[i("el-button",{style:{background:t.color,borderColor:t.color},attrs:{icon:"el-icon-upload",size:"mini",type:"primary"},on:{click:function(e){t.dialogVisible=!0}}},[t._v(" upload ")]),i("el-dialog",{attrs:{visible:t.dialogVisible},on:{"update:visible":function(e){t.dialogVisible=e}}},[i("el-upload",{staticClass:"editor-slide-upload",attrs:{multiple:!0,"file-list":t.fileList,"show-file-list":!0,"on-remove":t.handleRemove,"on-success":t.handleSuccess,"before-upload":t.beforeUpload,action:"https://httpbin.org/post","list-type":"picture-card"}},[i("el-button",{attrs:{size:"small",type:"primary"}},[t._v(" Click upload ")])],1),i("el-button",{on:{click:function(e){t.dialogVisible=!1}}},[t._v(" Cancel ")]),i("el-button",{attrs:{type:"primary"},on:{click:t.handleSubmit}},[t._v(" Confirm ")])],1)],1)}),s=[],r=(i("a623"),i("d81d"),i("b64b"),i("d3b7"),i("3ca3"),i("ddb0"),i("2b3d"),{name:"EditorSlideUpload",props:{color:{type:String,default:"#1890ff"}},data:function(){return{dialogVisible:!1,listObj:{},fileList:[]}},methods:{checkAllSuccess:function(){var t=this;return Object.keys(this.listObj).every((function(e){return t.listObj[e].hasSuccess}))},handleSubmit:function(){var t=this,e=Object.keys(this.listObj).map((function(e){return t.listObj[e]}));this.checkAllSuccess()?(this.$emit("successCBK",e),this.listObj={},this.fileList=[],this.dialogVisible=!1):this.$message("Please wait for all images to be uploaded successfully. If there is a network problem, please refresh the page and upload again!")},handleSuccess:function(t,e){for(var i=e.uid,n=Object.keys(this.listObj),o=0,a=n.length;o<a;o++)if(this.listObj[n[o]].uid===i)return this.listObj[n[o]].url=t.files.file,void(this.listObj[n[o]].hasSuccess=!0)},handleRemove:function(t){for(var e=t.uid,i=Object.keys(this.listObj),n=0,o=i.length;n<o;n++)if(this.listObj[i[n]].uid===e)return void delete this.listObj[i[n]]},beforeUpload:function(t){var e=this,i=window.URL||window.webkitURL,n=t.uid;return this.listObj[n]={},new Promise((function(o,a){var s=new Image;s.src=i.createObjectURL(t),s.onload=function(){e.listObj[n]={hasSuccess:!1,uid:t.uid,width:this.width,height:this.height}},o(!0)}))}}}),l=r,c=(i("e791"),i("2877")),d=Object(c["a"])(l,a,s,!1,null,"30ea5378",null),u=d.exports,f=["advlist anchor autolink autosave code codesample colorpicker colorpicker contextmenu directionality emoticons fullscreen hr image imagetools insertdatetime link lists media nonbreaking noneditable pagebreak paste preview print save searchreplace spellchecker tabfocus table template textcolor textpattern visualblocks visualchars wordcount"],m=f,h=["searchreplace bold italic underline strikethrough alignleft aligncenter alignright outdent indent  blockquote undo redo removeformat subscript superscript code codesample","hr bullist numlist link image charmap preview anchor pagebreak insertdatetime media table emoticons forecolor backcolor fullscreen"],p=h,b=i("b85c"),g=[];function v(){return window.tinymce}var y=function(t,e){var i=document.getElementById(t),n=e||function(){};if(!i){var o=document.createElement("script");o.src=t,o.id=t,document.body.appendChild(o),g.push(n);var a="onload"in o?s:r;a(o)}function s(e){e.onload=function(){this.onerror=this.onload=null;var t,i=Object(b["a"])(g);try{for(i.s();!(t=i.n()).done;){var n=t.value;n(null,e)}}catch(o){i.e(o)}finally{i.f()}g=null},e.onerror=function(){this.onerror=this.onload=null,n(new Error("Failed to load "+t),e)}}function r(t){t.onreadystatechange=function(){if("complete"===this.readyState||"loaded"===this.readyState){this.onreadystatechange=null;var e,i=Object(b["a"])(g);try{for(i.s();!(e=i.n()).done;){var n=e.value;n(null,t)}}catch(o){i.e(o)}finally{i.f()}g=null}}}i&&n&&(v()?n(null,i):g.push(n))},_=y,w="https://cdn.jsdelivr.net/npm/tinymce-all-in-one@4.9.3/tinymce.min.js",k={name:"Tinymce",components:{editorImage:u},props:{id:{type:String,default:function(){return"vue-tinymce-"+ +new Date+(1e3*Math.random()).toFixed(0)}},value:{type:String,default:""},statusbar:{type:Boolean,default:!0},readonly:{type:Boolean,default:!1},editorImage:{type:Boolean,default:!0},toolbar:{type:Array,required:!1,default:function(){return[]}},menubar:{type:String,default:"file edit insert view format table"},height:{type:[Number,String],required:!1,default:360},width:{type:[Number,String],required:!1,default:"auto"}},data:function(){return{hasChange:!1,hasInit:!1,tinymceId:this.id,fullscreen:!1,languageTypeList:{en:"en",zh:"zh_CN",es:"es_MX",ja:"ja"}}},computed:{language:function(){return this.languageTypeList[this.$store.getters.language]},containerWidth:function(){var t=this.width;return/^[\d]+(\.[\d]+)?$/.test(t)?"".concat(t,"px"):t}},watch:{value:function(t){var e=this;!this.hasChange&&this.hasInit&&this.$nextTick((function(){return window.tinymce.get(e.tinymceId).setContent(t||"")}))},language:function(){var t=this;this.destroyTinymce(),this.$nextTick((function(){return t.initTinymce()}))}},mounted:function(){this.init()},activated:function(){window.tinymce&&this.initTinymce()},deactivated:function(){this.destroyTinymce()},destroyed:function(){this.destroyTinymce()},methods:{init:function(){var t=this;_(w,(function(e){e?t.$message.error(e.message):t.initTinymce()}))},initTinymce:function(){var t=this,e=this;window.tinymce.init({language:this.language,selector:"#".concat(this.tinymceId),height:this.height,body_class:"panel-body ",object_resizing:!1,toolbar:this.toolbar.length>0?this.toolbar:p,readonly:this.readonly,menubar:this.menubar,plugins:m,end_container_on_empty_block:!0,powerpaste_word_import:"clean",code_dialog_height:450,code_dialog_width:1e3,advlist_bullet_styles:"square",advlist_number_styles:"default",imagetools_cors_hosts:["www.tinymce.com","codepen.io"],default_link_target:"_blank",link_title:!1,statusbar:this.statusbar,nonbreaking_force_tab:!0,save_onsavecallback:function(){return!1},init_instance_callback:function(i){e.value&&i.setContent(e.value),e.hasInit=!0,i.on("NodeChange Change KeyUp SetContent",(function(){t.hasChange=!0,t.$emit("input",i.getContent())}))},setup:function(t){t.on("FullscreenStateChanged",(function(t){e.fullscreen=t.state}))},convert_urls:!1})},destroyTinymce:function(){var t=window.tinymce.get(this.tinymceId);this.fullscreen&&t.execCommand("mceFullScreen"),t&&t.destroy()},setContent:function(t){window.tinymce.get(this.tinymceId).setContent(t)},getContent:function(){window.tinymce.get(this.tinymceId).getContent()},imageSuccessCBK:function(t){var e=this;t.forEach((function(t){window.tinymce.get(e.tinymceId).insertContent('<img class="wscnph" src="'.concat(t.url,'" >'))}))}}},C=k,I=(i("642e"),Object(c["a"])(C,n,o,!1,null,"aa4c9578",null));e["a"]=I.exports},"87cd":function(t,e,i){"use strict";i.r(e);var n=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"app-container"},[i("el-row",[i("el-col",{attrs:{span:24}},[i("el-form",{ref:"formInline",attrs:{inline:!0,model:t.formInline}},[i("el-form-item",{attrs:{label:t.$t("notification.message"),prop:"message"}},[i("el-input",{attrs:{placeholder:t.$t("notification.message")},model:{value:t.formInline.message,callback:function(e){t.$set(t.formInline,"message",e)},expression:"formInline.message"}})],1),i("el-form-item",{attrs:{label:t.$t("notification.is_read")}},[i("el-select",{attrs:{placeholder:t.$t("notification.is_read")},model:{value:t.formInline.is_read,callback:function(e){t.$set(t.formInline,"is_read",e)},expression:"formInline.is_read"}},[i("el-option",{attrs:{label:t.$t("exception.solveStatus.all"),value:""}}),i("el-option",{attrs:{label:t.$t("notification.is_read0"),value:0}}),i("el-option",{attrs:{label:t.$t("notification.is_read1"),value:1}})],1)],1),i("el-form-item",{attrs:{label:t.$t("common.createTime"),prop:"time"}},[i("el-date-picker",{attrs:{type:"datetimerange","picker-options":t.pickerOptions,"range-separator":"~","start-placeholder":t.$t("common.startTime"),"end-placeholder":t.$t("common.endTime"),align:"right"},model:{value:t.formInline.time,callback:function(e){t.$set(t.formInline,"time",e)},expression:"formInline.time"}})],1),i("el-form-item",[i("el-button",{attrs:{type:"primary"},on:{click:t.onSubmit}},[t._v(t._s(t.$t("common.search")))]),i("el-button",{on:{click:function(e){return t.resetForm("formInline")}}},[t._v(t._s(t.$t("common.reset")))])],1)],1)],1),i("el-col",{attrs:{span:24}},[i("el-form",{attrs:{inline:!0}},[i("el-form-item",[i("router-link",{attrs:{to:"/notification/send"}},[i("el-button",{attrs:{type:"primary",icon:"el-icon-s-promotion"}},[t._v(" "+t._s(t.$t("notification.send"))+" ")])],1)],1),i("el-form-item",[i("el-dropdown",[i("el-button",{attrs:{type:"primary"}},[t._v(" "+t._s(t.$t("notification.is_read1"))+" "),i("i",{staticClass:"el-icon-arrow-down el-icon--right"})]),i("el-dropdown-menu",{attrs:{slot:"dropdown"},slot:"dropdown"},[i("el-dropdown-item",[i("span",{on:{click:t.readHandle}},[t._v(t._s(t.$t("notification.read")))])]),i("el-dropdown-item",[i("span",{on:{click:t.allReadHandle}},[t._v(t._s(t.$t("notification.allRead")))])])],1)],1)],1)],1)],1),i("el-col",{directives:[{name:"loading",rawName:"v-loading",value:t.loading,expression:"loading"}],attrs:{span:24}},[i("el-col",{attrs:{span:24}},[i("el-table",{ref:"multipleTable",staticStyle:{width:"100%"},attrs:{"highlight-current-row":"",data:t.tableData,"default-sort":{prop:this.sort,order:this.order}},on:{"sort-change":t.tableSortChange,"cell-dblclick":t.notificationInfo}},[i("el-table-column",{attrs:{type:"selection",selectable:t.checkSelect,width:"55"}}),i("el-table-column",{attrs:{width:"25px"},scopedSlots:t._u([{key:"default",fn:function(t){return[i("i",{staticClass:"el-icon-message",style:{color:null===t.row.read_at?"#E6A23C":"#C0C4CC"}})]}}])}),i("el-table-column",{attrs:{label:t.$t("notification.message")},scopedSlots:t._u([{key:"default",fn:function(e){return[null===e.row.read_at?i("span",[i("strong",[t._v(t._s(e.row.data))])]):i("span",[t._v(t._s(e.row.data))])]}}])}),i("el-table-column",{attrs:{prop:"created_at",label:t.$t("common.createdAt"),formatter:t.rTime,sortable:""}})],1)],1),i("el-col",{staticClass:"margin-t-10",attrs:{span:24}},[i("el-pagination",{attrs:{"page-sizes":[10,25,50],"page-size":10,"current-page":t.offset,layout:"total, sizes, prev, pager, next, jumper",total:t.total},on:{"size-change":t.handleSizeChange,"current-change":t.handleCurrentChange}})],1)],1)],1),i("el-dialog",{directives:[{name:"el-drag-dialog",rawName:"v-el-drag-dialog"}],attrs:{title:t.$t("common.details"),visible:t.notificationInfoShow},on:{"update:visible":function(e){t.notificationInfoShow=e}}},[i("el-form",{attrs:{"label-position":"top"}},[i("el-form-item",{attrs:{label:t.$t("notification.form")}},[t._v(" "+t._s(t.notificationInfoData.data?t.notificationInfoData.data.form:"")+" ")]),i("el-form-item",{attrs:{label:t.$t("notification.message")}},[i("Tinymce",{attrs:{value:t.notificationInfoData.data?t.notificationInfoData.data.message:"",statusbar:!1,height:400,toolbar:[1],menubar:"",readonly:!0,"editor-image":!1}})],1),i("el-form-item",{attrs:{label:t.$t("common.createdAt")}},[t._v(" "+t._s(t.rTime2(t.notificationInfoData.created_at))+" ")])],1)],1)],1)},o=[],a=(i("4160"),i("159b"),i("8256")),s=i("4360"),r=i("277f"),l=i("ed08"),c={name:"Notification",components:{Tinymce:a["a"]},data:function(){return{total:0,loading:!0,order:"descending",sort:"created_at",offset:0,limit:10,tableData:[],formInline:{message:"",is_read:"",time:""},pickerOptions:{shortcuts:[{text:this.$t("common.week"),onClick:function(t){var e=new Date,i=new Date;i.setTime(i.getTime()-6048e5),t.$emit("pick",[i,e])}},{text:this.$t("common.oneMonth"),onClick:function(t){var e=new Date,i=new Date;i.setTime(i.getTime()-2592e6),t.$emit("pick",[i,e])}},{text:this.$t("common.threeMonth"),onClick:function(t){var e=new Date,i=new Date;i.setTime(i.getTime()-7776e6),t.$emit("pick",[i,e])}}]},notificationInfoShow:!1,notificationInfoData:{}}},mounted:function(){this.getNotifications()},methods:{getNotifications:function(){var t=this;this.loading=!0;var e={offset:this.offset,limit:this.limit,order:this.order,sort:this.sort,message:this.formInline.message};""!==Object(l["d"])(this.formInline.time[0])&&(e["start_at"]=Object(l["d"])(this.formInline.time[0])),""!==Object(l["d"])(this.formInline.time[1])&&(e["end_at"]=Object(l["d"])(this.formInline.time[1])),""!==this.formInline.is_read&&(e["is_read"]=this.formInline.is_read),Object(r["d"])(e).then((function(e){var i=e.data;t.loading=!1,t.tableData=i.notifications,t.total=i.total}))},tableSortChange:function(t){this.order=t.order?t.order:"descending",this.sort=t.prop,this.offset=0,this.getNotifications()},rTime:function(t,e){return Object(l["d"])(t[e.property])},rTime2:function(t){return Object(l["d"])(t)},handleSizeChange:function(t){this.limit=t,this.getNotifications()},handleCurrentChange:function(t){this.offset=t,this.getNotifications()},onSubmit:function(){this.offset=0,this.getNotifications()},resetForm:function(t){this.$refs[t].resetFields(),this.offset=0,this.getNotifications()},notificationInfo:function(t,e){var i=this;Object(r["c"])({id:t.id}).then((function(t){i.notificationInfoShow=!0,i.notificationInfoData=t.data,Object(r["g"])().then((function(t){var e=t.data.count;i.notificationCount(e)})),i.getNotifications()}))},checkSelect:function(t,e){var i=!0;return i=null===t.read_at,i},allReadHandle:function(){var t=this;Object(r["b"])().then((function(e){t.getNotifications(),t.notificationCount(0)}))},readHandle:function(){var t=this,e=[],i=this.$refs.multipleTable.store.states.selection;i.forEach((function(t){e.push(t.id)})),e.length>0?Object(r["e"])({id:e}).then((function(e){t.getNotifications(),Object(r["g"])().then((function(e){var i=e.data.count;t.notificationCount(i)}))})):this.$message.error(this.$t("notification.checkMessage"))},notificationCount:function(t){s["a"].dispatch("user/notificationCount",t)}}},d=c,u=i("2877"),f=Object(u["a"])(d,n,o,!1,null,"3e7143e3",null);e["default"]=f.exports},e791:function(t,e,i){"use strict";var n=i("eeb6"),o=i.n(n);o.a},eeb6:function(t,e,i){}}]);