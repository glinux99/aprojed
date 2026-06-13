import{o as e}from"./button-CPuKytdE.js";import{Ct as t,Zt as n,_n as r,ar as i,bn as a,bt as o,c as s,dn as c,en as l,in as u,jt as d,kn as f,nn as p,on as m,rn as h,tn as g,ur as _,yn as v}from"./app-DVQ3uKMe.js";import{t as y}from"./paginator-Cz1dyMGj.js";var b=s.extend({name:`dataview`,style:`
    .p-dataview {
        position: relative;
        display: block;
        border-color: dt('dataview.border.color');
        border-width: dt('dataview.border.width');
        border-style: solid;
        border-radius: dt('dataview.border.radius');
        padding: dt('dataview.padding');
    }

    .p-dataview-header {
        background: dt('dataview.header.background');
        color: dt('dataview.header.color');
        border-color: dt('dataview.header.border.color');
        border-width: dt('dataview.header.border.width');
        border-style: solid;
        padding: dt('dataview.header.padding');
        border-radius: dt('dataview.header.border.radius');
    }

    .p-dataview-content {
        background: dt('dataview.content.background');
        border-color: dt('dataview.content.border.color');
        border-width: dt('dataview.content.border.width');
        border-style: solid;
        color: dt('dataview.content.color');
        padding: dt('dataview.content.padding');
        border-radius: dt('dataview.content.border.radius');
    }

    .p-dataview-footer {
        background: dt('dataview.footer.background');
        color: dt('dataview.footer.color');
        border-color: dt('dataview.footer.border.color');
        border-width: dt('dataview.footer.border.width');
        border-style: solid;
        padding: dt('dataview.footer.padding');
        border-radius: dt('dataview.footer.border.radius');
    }

    .p-dataview-paginator-top {
        border-width: dt('dataview.paginator.top.border.width');
        border-color: dt('dataview.paginator.top.border.color');
        border-style: solid;
    }

    .p-dataview-paginator-bottom {
        border-width: dt('dataview.paginator.bottom.border.width');
        border-color: dt('dataview.paginator.bottom.border.color');
        border-style: solid;
    }

    .p-dataview-loading-overlay {
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 2;
    }
`,classes:{root:function(e){var t=e.props;return[`p-dataview p-component`,{"p-dataview-list":t.layout===`list`,"p-dataview-grid":t.layout===`grid`}]},header:`p-dataview-header`,pcPaginator:function(e){return`p-dataview-paginator-`+e.position},content:`p-dataview-content`,emptyMessage:`p-dataview-empty-message`,footer:`p-dataview-footer`}}),x={name:`BaseDataView`,extends:e,props:{value:{type:Array,default:null},layout:{type:String,default:`list`},rows:{type:Number,default:0},first:{type:Number,default:0},totalRecords:{type:Number,default:0},paginator:{type:Boolean,default:!1},paginatorPosition:{type:String,default:`bottom`},alwaysShowPaginator:{type:Boolean,default:!0},paginatorTemplate:{type:String,default:`FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown`},pageLinkSize:{type:Number,default:5},rowsPerPageOptions:{type:Array,default:null},currentPageReportTemplate:{type:String,default:`({currentPage} of {totalPages})`},sortField:{type:[String,Function],default:null},sortOrder:{type:Number,default:null},lazy:{type:Boolean,default:!1},dataKey:{type:String,default:null}},style:b,provide:function(){return{$pcDataView:this,$parentInstance:this}}};function S(e){return E(e)||T(e)||w(e)||C()}function C(){throw TypeError(`Invalid attempt to spread non-iterable instance.
In order to be iterable, non-array objects must have a [Symbol.iterator]() method.`)}function w(e,t){if(e){if(typeof e==`string`)return D(e,t);var n={}.toString.call(e).slice(8,-1);return n===`Object`&&e.constructor&&(n=e.constructor.name),n===`Map`||n===`Set`?Array.from(e):n===`Arguments`||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)?D(e,t):void 0}}function T(e){if(typeof Symbol<`u`&&e[Symbol.iterator]!=null||e[`@@iterator`]!=null)return Array.from(e)}function E(e){if(Array.isArray(e))return D(e)}function D(e,t){(t==null||t>e.length)&&(t=e.length);for(var n=0,r=Array(t);n<t;n++)r[n]=e[n];return r}var O={name:`DataView`,extends:x,inheritAttrs:!1,emits:[`update:first`,`update:rows`,`page`],data:function(){return{d_first:this.first,d_rows:this.rows}},watch:{first:function(e){this.d_first=e},rows:function(e){this.d_rows=e},sortField:function(){this.resetPage()},sortOrder:function(){this.resetPage()}},methods:{getKey:function(e,t){return this.dataKey?d(e,this.dataKey):t},onPage:function(e){this.d_first=e.first,this.d_rows=e.rows,this.$emit(`update:first`,this.d_first),this.$emit(`update:rows`,this.d_rows),this.$emit(`page`,e)},sort:function(){var e=this;if(this.value){var n=S(this.value),r=o();return n.sort(function(n,i){return t(d(n,e.sortField),d(i,e.sortField),e.sortOrder,r)}),n}else return null},resetPage:function(){this.d_first=0,this.$emit(`update:first`,this.d_first)}},computed:{getTotalRecords:function(){return this.totalRecords?this.totalRecords:this.value?this.value.length:0},empty:function(){return!this.value||this.value.length===0},emptyMessageText:function(){var e;return((e=this.$primevue.config)==null||(e=e.locale)==null?void 0:e.emptyMessage)||``},paginatorTop:function(){return this.paginator&&(this.paginatorPosition!==`bottom`||this.paginatorPosition===`both`)},paginatorBottom:function(){return this.paginator&&(this.paginatorPosition!==`top`||this.paginatorPosition===`both`)},items:function(){if(this.value&&this.value.length){var e=this.value;if(e&&e.length&&this.sortField&&(e=this.sort()),this.paginator){var t=this.lazy?0:this.d_first;return e.slice(t,t+this.d_rows)}else return e}else return null}},components:{DVPaginator:y}};function k(e,t,o,s,d,y){var b=a(`DVPaginator`);return r(),h(`div`,c({class:e.cx(`root`)},e.ptmi(`root`)),[e.$slots.header?(r(),h(`div`,c({key:0,class:e.cx(`header`)},e.ptm(`header`)),[v(e.$slots,`header`)],16)):p(``,!0),y.paginatorTop?(r(),g(b,{key:1,rows:d.d_rows,first:d.d_first,totalRecords:y.getTotalRecords,pageLinkSize:e.pageLinkSize,template:e.paginatorTemplate,rowsPerPageOptions:e.rowsPerPageOptions,currentPageReportTemplate:e.currentPageReportTemplate,class:i(e.cx(`pcPaginator`,{position:`top`})),alwaysShow:e.alwaysShowPaginator,onPage:t[0]||=function(e){return y.onPage(e)},unstyled:e.unstyled,pt:e.ptm(`pcPaginator`)},u({_:2},[e.$slots.paginatorcontainer?{name:`container`,fn:f(function(t){return[v(e.$slots,`paginatorcontainer`,{first:t.first,last:t.last,rows:t.rows,page:t.page,pageCount:t.pageCount,pageLinks:t.pageLinks,totalRecords:t.totalRecords,firstPageCallback:t.firstPageCallback,lastPageCallback:t.lastPageCallback,prevPageCallback:t.prevPageCallback,nextPageCallback:t.nextPageCallback,rowChangeCallback:t.rowChangeCallback,changePageCallback:t.changePageCallback})]}),key:`0`}:void 0,e.$slots.paginatorstart?{name:`start`,fn:f(function(){return[v(e.$slots,`paginatorstart`)]}),key:`1`}:void 0,e.$slots.paginatorend?{name:`end`,fn:f(function(){return[v(e.$slots,`paginatorend`)]}),key:`2`}:void 0]),1032,[`rows`,`first`,`totalRecords`,`pageLinkSize`,`template`,`rowsPerPageOptions`,`currentPageReportTemplate`,`class`,`alwaysShow`,`unstyled`,`pt`])):p(``,!0),l(`div`,c({class:e.cx(`content`)},e.ptm(`content`)),[y.empty?(r(),h(`div`,c({key:1,class:e.cx(`emptyMessage`)},e.ptm(`emptyMessage`)),[v(e.$slots,`empty`,{layout:e.layout},function(){return[m(_(y.emptyMessageText),1)]})],16)):(r(),h(n,{key:0},[e.$slots.list&&e.layout===`list`?v(e.$slots,`list`,{key:0,items:y.items}):p(``,!0),e.$slots.grid&&e.layout===`grid`?v(e.$slots,`grid`,{key:1,items:y.items}):p(``,!0)],64))],16),y.paginatorBottom?(r(),g(b,{key:2,rows:d.d_rows,first:d.d_first,totalRecords:y.getTotalRecords,pageLinkSize:e.pageLinkSize,template:e.paginatorTemplate,rowsPerPageOptions:e.rowsPerPageOptions,currentPageReportTemplate:e.currentPageReportTemplate,class:i(e.cx(`pcPaginator`,{position:`bottom`})),alwaysShow:e.alwaysShowPaginator,onPage:t[1]||=function(e){return y.onPage(e)},unstyled:e.unstyled,pt:e.ptm(`pcPaginator`)},u({_:2},[e.$slots.paginatorcontainer?{name:`container`,fn:f(function(t){return[v(e.$slots,`paginatorcontainer`,{first:t.first,last:t.last,rows:t.rows,page:t.page,pageCount:t.pageCount,pageLinks:t.pageLinks,totalRecords:t.totalRecords,firstPageCallback:t.firstPageCallback,lastPageCallback:t.lastPageCallback,prevPageCallback:t.prevPageCallback,nextPageCallback:t.nextPageCallback,rowChangeCallback:t.rowChangeCallback,changePageCallback:t.changePageCallback})]}),key:`0`}:void 0,e.$slots.paginatorstart?{name:`start`,fn:f(function(){return[v(e.$slots,`paginatorstart`)]}),key:`1`}:void 0,e.$slots.paginatorend?{name:`end`,fn:f(function(){return[v(e.$slots,`paginatorend`)]}),key:`2`}:void 0]),1032,[`rows`,`first`,`totalRecords`,`pageLinkSize`,`template`,`rowsPerPageOptions`,`currentPageReportTemplate`,`class`,`alwaysShow`,`unstyled`,`pt`])):p(``,!0),e.$slots.footer?(r(),h(`div`,c({key:3,class:e.cx(`footer`)},e.ptm(`footer`)),[v(e.$slots,`footer`)],16)):p(``,!0)],16)}O.render=k;export{O as t};