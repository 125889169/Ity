(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-3d52b143"],{3089:function(e,t,s){"use strict";var n=s("d27c"),o=s.n(n);o.a},7416:function(e,t,s){"use strict";s.r(t);var n=function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("div",{staticClass:"app-container"},[s("el-row",[s("el-col",{attrs:{span:24}},[s("el-col",{attrs:{span:24}},[s("h2",[e._v("在线人数: "+e._s(e.count))])]),s("el-col",{staticClass:"content padding-15",attrs:{id:"chatRecord",span:24}},e._l(e.groupChat,(function(t,n){return s("el-col",{class:e.clientId===t.clientId?"text-right":"",attrs:{span:24}},[s("p",[e._v(e._s(t.name)+" "),s("small",{staticStyle:{color:"#909399"}},[e._v(e._s(e.rTime(t.created_at)))])]),s("p",[e._v(e._s(t.message))])])})),1),s("el-col",{staticClass:"padding-15",attrs:{span:24}},[s("el-col",{attrs:{span:18}},[s("el-input",{attrs:{type:"text",placeholder:"请输入内容",autosize:"",resize:"none",maxlength:"100","show-word-limit":""},nativeOn:{keyup:function(t){return!t.type.indexOf("key")&&e._k(t.keyCode,"enter",13,t.key,"Enter")?null:e.send(t)}},model:{value:e.textarea,callback:function(t){e.textarea=t},expression:"textarea"}})],1),s("el-col",{attrs:{span:5,offset:1}},[s("el-button",{attrs:{type:"primary"},on:{click:e.send}},[e._v("Send")])],1)],1)],1)],1)],1)},o=[],a=(s("99af"),s("ed08")),c=s("5f87"),r=s("4360"),i={name:"Websocket",data:function(){return{textarea:"",count:0,clientId:0,groupChat:[]}},mounted:function(){var e=Object(c["a"])(),t="en";switch(r["a"].getters.language){case"zh":t="zh-CN";break;default:t="en"}if("WebSocket"in window){var s="ws://47.95.37.116:2346";this.websocket=new WebSocket("".concat(s,"?lang=").concat(t,"&token=").concat(e)),this.initWebSocket()}else this.$message.error("当前浏览器不支持websocket")},beforeDestroy:function(){this.onbeforeunload()},methods:{initWebSocket:function(){this.websocket.onerror=this.setErrorMessage,this.websocket.onopen=this.setOnopenMessage,this.websocket.onmessage=this.setOnmessageMessage,this.websocket.onclose=this.setOncloseMessage,window.onbeforeunload=this.onbeforeunload},setErrorMessage:function(){this.$message.error("WebSocket连接发生错误")},setOnopenMessage:function(){this.$message({message:"连接成功",type:"success"});var e={route:"websocket.gc.online"};this.websocket.send(JSON.stringify(e));var t={route:"websocket.gc.chatRecord"};this.websocket.send(JSON.stringify(t))},setOnmessageMessage:function(e){var t=JSON.parse(e.data);if("heart"!==t.type)if(!0===t.success){var s=t.data;switch(s.type){case"onWebSocketConnect":this.clientId=s.clientId;break;case"online":this.count=s.count;break;case"getChatRecord":this.groupChat=s.groupChat,this.$nextTick((function(){var e=document.getElementById("chatRecord");e.scrollTop=e.scrollHeight}));break;case"onClose":this.count=s.count;break;default:}}else this.$message.error(t.message)},setOncloseMessage:function(){this.$message("连接关闭")},onbeforeunload:function(){this.closeWebSocket()},closeWebSocket:function(){this.websocket.close()},send:function(){if(this.textarea.length>0){var e={route:"websocket.gc.send",data:{message:this.textarea}};this.websocket.send(JSON.stringify(e));var t={route:"websocket.gc.chatRecord"};this.websocket.send(JSON.stringify(t)),this.textarea=""}else this.$message.error("????????????????????????")},rTime:function(e){return Object(a["d"])(e)}}},l=i,u=(s("3089"),s("2877")),h=Object(u["a"])(l,n,o,!1,null,"a3648a38",null);t["default"]=h.exports},d27c:function(e,t,s){}}]);