(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-991942e0"],{"0541":function(t,e,n){"use strict";var i=n("352c"),a=n.n(i);a.a},"1fc6":function(t,e,n){},"277f":function(t,e,n){"use strict";n.d(e,"d",(function(){return a})),n.d(e,"c",(function(){return o})),n.d(e,"b",(function(){return s})),n.d(e,"g",(function(){return r})),n.d(e,"f",(function(){return c})),n.d(e,"e",(function(){return l})),n.d(e,"a",(function(){return u}));var i=n("b775");function a(t){return Object(i["a"])({url:"/notifications",method:"post",data:t})}function o(t){return Object(i["a"])({url:"/notification",method:"post",data:t})}function s(t){return Object(i["a"])({url:"/notification/allRead",method:"post",data:t})}function r(t){return Object(i["a"])({url:"/notification/unReadCount",method:"post",data:t})}function c(t){return Object(i["a"])({url:"/notification/send",method:"post",data:t})}function l(t){return Object(i["a"])({url:"/notification/read",method:"post",data:t})}function u(t){return Object(i["a"])({url:"/notification/admins",method:"post",data:t})}},"352c":function(t,e,n){},"3f5e":function(t,e,n){"use strict";n.d(e,"c",(function(){return a})),n.d(e,"e",(function(){return o})),n.d(e,"b",(function(){return s})),n.d(e,"a",(function(){return r})),n.d(e,"f",(function(){return c})),n.d(e,"d",(function(){return l}));var i=n("b775");function a(t){return Object(i["a"])({url:"/file/download",method:"post",responseType:"blob",timeout:0,data:t})}function o(t){return Object(i["a"])({url:"/files",method:"post",data:t})}function s(t){return Object(i["a"])({url:"/file/delete",method:"post",data:t})}function r(t){return Object(i["a"])({url:"/file/deleteDirectory",method:"post",data:t})}function c(t){return Object(i["a"])({url:"/file/makeDirectory",method:"post",data:t})}function l(t){return Object(i["a"])({url:"/file/upload",method:"post",data:t})}},"7c9e":function(t,e,n){"use strict";var i=n("1fc6"),a=n.n(i);a.a},8256:function(t,e,n){"use strict";var i=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"tinymce-container",class:{fullscreen:t.fullscreen},style:{width:t.containerWidth}},[n("textarea",{staticClass:"tinymce-textarea",attrs:{id:t.tinymceId}}),t._v(" "),t.editorImage?n("div",{staticClass:"editor-custom-btn-container"},[n("editorImage",{staticClass:"editor-upload-btn",on:{successCBK:t.imageSuccessCBK}})],1):t._e()])},a=[],o=(n("4160"),n("a9e3"),n("b680"),n("159b"),function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"upload-container"},[n("el-button",{attrs:{icon:"el-icon-upload",size:"mini",type:"primary"},on:{click:function(e){t.dialogVisible=!0}}},[t._v(" "+t._s(t.$t("file.uploadFile"))+" ")]),n("el-dialog",{attrs:{visible:t.dialogVisible},on:{"update:visible":function(e){t.dialogVisible=e}}},[n("el-upload",{staticClass:"editor-slide-upload",attrs:{multiple:!0,"file-list":t.fileList,"show-file-list":!0,"on-remove":t.handleRemove,"on-success":t.handleSuccess,"before-upload":t.beforeUpload,action:"https://httpbin.org/post","list-type":"picture-card"}},[n("el-button",{attrs:{size:"small",type:"primary"}},[t._v(" "+t._s(t.$t("file.uploadFileText.uploadText2"))+" ")])],1),n("el-button",{on:{click:function(e){t.dialogVisible=!1}}},[t._v(" "+t._s(t.$t("common.cancelButtonText"))+" ")]),n("el-button",{attrs:{type:"primary"},on:{click:t.handleSubmit}},[t._v(" "+t._s(t.$t("common.confirmButtonText"))+" ")])],1)],1)}),s=[],r=(n("a623"),n("d81d"),n("b64b"),n("d3b7"),n("3ca3"),n("ddb0"),n("2b3d"),{name:"EditorSlideUpload",props:{},data:function(){return{dialogVisible:!1,listObj:{},fileList:[]}},methods:{checkAllSuccess:function(){var t=this;return Object.keys(this.listObj).every((function(e){return t.listObj[e].hasSuccess}))},handleSubmit:function(){var t=this,e=Object.keys(this.listObj).map((function(e){return t.listObj[e]}));this.checkAllSuccess()?(this.$emit("successCBK",e),this.listObj={},this.fileList=[],this.dialogVisible=!1):this.$message("Please wait for all images to be uploaded successfully. If there is a network problem, please refresh the page and upload again!")},handleSuccess:function(t,e){for(var n=e.uid,i=Object.keys(this.listObj),a=0,o=i.length;a<o;a++)if(this.listObj[i[a]].uid===n)return this.listObj[i[a]].url=t.files.file,void(this.listObj[i[a]].hasSuccess=!0)},handleRemove:function(t){for(var e=t.uid,n=Object.keys(this.listObj),i=0,a=n.length;i<a;i++)if(this.listObj[n[i]].uid===e)return void delete this.listObj[n[i]]},beforeUpload:function(t){var e=this,n=window.URL||window.webkitURL,i=t.uid;return this.listObj[i]={},new Promise((function(a,o){var s=new Image;s.src=n.createObjectURL(t),s.onload=function(){e.listObj[i]={hasSuccess:!1,uid:t.uid,width:this.width,height:this.height}},a(!0)}))}}}),c=r,l=(n("0541"),n("2877")),u=Object(l["a"])(c,o,s,!1,null,"5c2b9a24",null),d=u.exports,f=["advlist anchor autolink autosave code codesample colorpicker colorpicker contextmenu directionality emoticons fullscreen hr image imagetools insertdatetime link lists media nonbreaking noneditable pagebreak paste preview print save searchreplace spellchecker tabfocus table template textcolor textpattern visualblocks visualchars wordcount"],m=f,h=["searchreplace bold italic underline strikethrough alignleft aligncenter alignright outdent indent  blockquote undo redo removeformat subscript superscript code codesample","hr bullist numlist link image charmap preview anchor pagebreak insertdatetime media table emoticons forecolor backcolor fullscreen"],b=h,p=n("b85c"),g=[];function y(){return window.tinymce}var v=function(t,e){var n=document.getElementById(t),i=e||function(){};if(!n){var a=document.createElement("script");a.src=t,a.id=t,document.body.appendChild(a),g.push(i);var o="onload"in a?s:r;o(a)}function s(e){e.onload=function(){this.onerror=this.onload=null;var t,n=Object(p["a"])(g);try{for(n.s();!(t=n.n()).done;){var i=t.value;i(null,e)}}catch(a){n.e(a)}finally{n.f()}g=null},e.onerror=function(){this.onerror=this.onload=null,i(new Error("Failed to load "+t),e)}}function r(t){t.onreadystatechange=function(){if("complete"===this.readyState||"loaded"===this.readyState){this.onreadystatechange=null;var e,n=Object(p["a"])(g);try{for(n.s();!(e=n.n()).done;){var i=e.value;i(null,t)}}catch(a){n.e(a)}finally{n.f()}g=null}}}n&&i&&(y()?i(null,n):g.push(i))},w=v,_=n("3f5e"),j="https://cdn.jsdelivr.net/npm/tinymce-all-in-one@4.9.3/tinymce.min.js",k={name:"Tinymce",components:{editorImage:d},props:{id:{type:String,default:function(){return"vue-tinymce-"+ +new Date+(1e3*Math.random()).toFixed(0)}},value:{type:String,default:""},statusbar:{type:Boolean,default:!0},readonly:{type:Boolean,default:!1},editorImage:{type:Boolean,default:!0},toolbar:{type:Array,required:!1,default:function(){return[]}},menubar:{type:String,default:"file edit insert view format table"},height:{type:[Number,String],required:!1,default:360},width:{type:[Number,String],required:!1,default:"auto"}},data:function(){return{hasChange:!1,hasInit:!1,tinymceId:this.id,fullscreen:!1,languageTypeList:{en:"en",zh:"zh_CN",es:"es_MX",ja:"ja"}}},computed:{language:function(){return this.languageTypeList[this.$store.getters.language]},containerWidth:function(){var t=this.width;return/^[\d]+(\.[\d]+)?$/.test(t)?"".concat(t,"px"):t}},watch:{value:function(t){var e=this;!this.hasChange&&this.hasInit&&this.$nextTick((function(){return window.tinymce.get(e.tinymceId).setContent(t||"")}))},language:function(){var t=this;this.destroyTinymce(),this.$nextTick((function(){return t.initTinymce()}))}},mounted:function(){this.init()},activated:function(){window.tinymce&&this.initTinymce()},deactivated:function(){this.destroyTinymce()},destroyed:function(){this.destroyTinymce()},methods:{init:function(){var t=this;w(j,(function(e){e?t.$message.error(e.message):t.initTinymce()}))},initTinymce:function(){var t=this,e=this;window.tinymce.init({language:this.language,selector:"#".concat(this.tinymceId),height:this.height,body_class:"panel-body ",object_resizing:!1,toolbar:this.toolbar.length>0?this.toolbar:b,readonly:this.readonly,menubar:this.menubar,plugins:m,end_container_on_empty_block:!0,powerpaste_word_import:"clean",code_dialog_height:450,code_dialog_width:1e3,advlist_bullet_styles:"square",advlist_number_styles:"default",imagetools_cors_hosts:["www.tinymce.com","codepen.io"],default_link_target:"_blank",link_title:!1,statusbar:this.statusbar,nonbreaking_force_tab:!0,save_onsavecallback:function(){return!1},init_instance_callback:function(n){e.value&&n.setContent(e.value),e.hasInit=!0,n.on("NodeChange Change KeyUp SetContent",(function(){t.hasChange=!0,t.$emit("input",n.getContent())}))},setup:function(t){t.on("FullscreenStateChanged",(function(t){e.fullscreen=t.state}))},convert_urls:!1,images_upload_handler:function(t,e,n,i){i(0);var a=new FormData;a.append("file",t.blob()),a.append("directory","notification"),Object(_["d"])(a).then((function(t){e(t.data.realPath),i(100)}))}})},destroyTinymce:function(){var t=window.tinymce.get(this.tinymceId);this.fullscreen&&t.execCommand("mceFullScreen"),t&&t.destroy()},setContent:function(t){window.tinymce.get(this.tinymceId).setContent(t)},getContent:function(){window.tinymce.get(this.tinymceId).getContent()},imageSuccessCBK:function(t){var e=this;t.forEach((function(t){window.tinymce.get(e.tinymceId).insertContent('<img class="wscnph" src="'.concat(t.url,'" >'))}))}}},O=k,C=(n("7c9e"),Object(l["a"])(O,i,a,!1,null,"4036b6c0",null));e["a"]=C.exports},b61c:function(t,e,n){"use strict";n.r(e);var i=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"app-container"},[n("el-row",[n("el-col",{directives:[{name:"loading",rawName:"v-loading",value:t.loading,expression:"loading"}],attrs:{span:24}},[n("el-form",{ref:"form",attrs:{model:t.form,"label-position":"top"}},[n("el-form-item",{attrs:{label:t.$t("notification.sender")}},[n("el-select",{staticStyle:{width:"100%"},attrs:{filterable:"",clearable:"",multiple:""},on:{change:t.selectChange},model:{value:t.form.admins,callback:function(e){t.$set(t.form,"admins",e)},expression:"form.admins"}},t._l(t.admins,(function(t){return n("el-option",{key:t.id,attrs:{label:t.name,value:t.id}})})),1)],1),n("el-form-item",{attrs:{label:t.$t("notification.message"),error:t.error.message?t.error.message[0]:""}},[n("Tinymce",{ref:"editor",attrs:{height:400,editorImage:!1},model:{value:t.form.message,callback:function(e){t.$set(t.form,"message",e)},expression:"form.message"}})],1),n("el-form-item",[n("el-button",{attrs:{type:"primary"},on:{click:t.send}},[t._v(t._s(t.$t("notification.send")))])],1)],1)],1)],1)],1)},a=[],o=(n("c975"),n("8256")),s=n("277f"),r={name:"NotificationSend",components:{Tinymce:o["a"]},data:function(){return{form:{message:"",admins:["all"]},admins:[{id:"all",name:this.$t("notification.all")}],error:[],loading:!1}},mounted:function(){this.getAdmins()},methods:{keydown:function(t){console.log(t)},selectChange:function(t){0===t.length&&(this.form.admins=["all"])},getAdmins:function(){var t=this;Object(s["a"])().then((function(e){var n=e.data.admins;n.unshift({id:"all",name:t.$t("notification.all")}),t.admins=n}))},send:function(){var t=this;this.loading=!0;var e=[],n=this.form.admins.indexOf("all");n<0&&(e=this.form.admins),Object(s["f"])({admins:e,message:this.form.message}).then((function(e){t.$message({message:e.message,type:"success"}),t.form={message:"",admins:["all"]},t.$refs.editor.setContent(""),t.loading=!1})).catch((function(e){if(422===e.response.status){var n=e.response.data.data;t.error=n,t.loading=!1}}))}}},c=r,l=n("2877"),u=Object(l["a"])(c,i,a,!1,null,"c9524c44",null);e["default"]=u.exports}}]);