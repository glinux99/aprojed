import{l as e,n as t,o as n}from"./button-CKJ0rbS0.js";import{An as r,F as i,Ht as a,Jt as o,Sn as s,Z as c,Zt as l,_n as u,ar as d,bn as f,c as p,dn as m,dt as h,en as g,kn as _,nn as v,rn as y,sn as b,tn as x,ur as S,vn as C,xn as w,yn as T}from"./app-C-O4ClPr.js";import{t as E}from"./chevrondown-COiNAZla.js";import{t as D}from"./chevronright-BCk4REJo.js";import{t as O}from"./chevronup-DA7TUCmk.js";var k=p.extend({name:`accordioncontent`,classes:{root:`p-accordioncontent`,contentWrapper:`p-accordioncontent-wrapper`,content:`p-accordioncontent-content`}}),A={name:`AccordionContent`,extends:{name:`BaseAccordionContent`,extends:n,props:{as:{type:[String,Object],default:`DIV`},asChild:{type:Boolean,default:!1}},style:k,provide:function(){return{$pcAccordionContent:this,$parentInstance:this}}},inheritAttrs:!1,inject:[`$pcAccordion`,`$pcAccordionPanel`],computed:{id:function(){return`${this.$pcAccordion.$id}_accordioncontent_${this.$pcAccordionPanel.value}`},ariaLabelledby:function(){return`${this.$pcAccordion.$id}_accordionheader_${this.$pcAccordionPanel.value}`},attrs:function(){return m(this.a11yAttrs,this.ptmi(`root`,this.ptParams))},a11yAttrs:function(){return{id:this.id,role:`region`,"aria-labelledby":this.ariaLabelledby,"data-pc-name":`accordioncontent`,"data-p-active":this.$pcAccordionPanel.active}},ptParams:function(){return{context:{active:this.$pcAccordionPanel.active}}}}};function j(e,t,n,i,c,l){return e.asChild?T(e.$slots,`default`,{key:1,class:d(e.cx(`root`)),active:l.$pcAccordionPanel.active,a11yAttrs:l.a11yAttrs}):(u(),x(a,m({key:0,name:`p-collapsible`},e.ptm(`transition`,l.ptParams)),{default:_(function(){return[!l.$pcAccordion.lazy||l.$pcAccordionPanel.active?r((u(),x(s(e.as),m({key:0,class:e.cx(`root`)},l.attrs),{default:_(function(){return[g(`div`,m({class:e.cx(`contentWrapper`)},e.ptm(`contentWrapper`,l.ptParams)),[g(`div`,m({class:e.cx(`content`)},e.ptm(`content`,l.ptParams)),[T(e.$slots,`default`)],16)],16)]}),_:3},16,[`class`])),[[o,l.$pcAccordion.lazy?!0:l.$pcAccordionPanel.active]]):v(``,!0)]}),_:3},16))}A.render=j;var M=p.extend({name:`accordionheader`,classes:{root:`p-accordionheader`,toggleicon:`p-accordionheader-toggle-icon`}}),N={name:`AccordionHeader`,extends:{name:`BaseAccordionHeader`,extends:n,props:{as:{type:[String,Object],default:`BUTTON`},asChild:{type:Boolean,default:!1}},style:M,provide:function(){return{$pcAccordionHeader:this,$parentInstance:this}}},inheritAttrs:!1,inject:[`$pcAccordion`,`$pcAccordionPanel`],methods:{onFocus:function(){this.$pcAccordion.selectOnFocus&&this.changeActiveValue()},onClick:function(){!this.$pcAccordion.selectOnFocus&&this.changeActiveValue()},onKeydown:function(e){switch(e.code){case`ArrowDown`:this.onArrowDownKey(e);break;case`ArrowUp`:this.onArrowUpKey(e);break;case`Home`:this.onHomeKey(e);break;case`End`:this.onEndKey(e);break;case`Enter`:case`NumpadEnter`:case`Space`:this.onEnterKey(e);break}},onArrowDownKey:function(e){var t=this.findNextPanel(this.findPanel(e.currentTarget));t?this.changeFocusedPanel(e,t):this.onHomeKey(e),e.preventDefault()},onArrowUpKey:function(e){var t=this.findPrevPanel(this.findPanel(e.currentTarget));t?this.changeFocusedPanel(e,t):this.onEndKey(e),e.preventDefault()},onHomeKey:function(e){var t=this.findFirstPanel();this.changeFocusedPanel(e,t),e.preventDefault()},onEndKey:function(e){var t=this.findLastPanel();this.changeFocusedPanel(e,t),e.preventDefault()},onEnterKey:function(e){this.changeActiveValue(),e.preventDefault()},findPanel:function(e){return e?.closest(`[data-pc-name="accordionpanel"]`)},findHeader:function(e){return h(e,`[data-pc-name="accordionheader"]`)},findNextPanel:function(e){var t=arguments.length>1&&arguments[1]!==void 0&&arguments[1]?e:e.nextElementSibling;return t?i(t,`data-p-disabled`)?this.findNextPanel(t):this.findHeader(t):null},findPrevPanel:function(e){var t=arguments.length>1&&arguments[1]!==void 0&&arguments[1]?e:e.previousElementSibling;return t?i(t,`data-p-disabled`)?this.findPrevPanel(t):this.findHeader(t):null},findFirstPanel:function(){return this.findNextPanel(this.$pcAccordion.$el.firstElementChild,!0)},findLastPanel:function(){return this.findPrevPanel(this.$pcAccordion.$el.lastElementChild,!0)},changeActiveValue:function(){this.$pcAccordion.updateValue(this.$pcAccordionPanel.value)},changeFocusedPanel:function(e,t){c(this.findHeader(t))}},computed:{id:function(){return`${this.$pcAccordion.$id}_accordionheader_${this.$pcAccordionPanel.value}`},ariaControls:function(){return`${this.$pcAccordion.$id}_accordioncontent_${this.$pcAccordionPanel.value}`},attrs:function(){return m(this.asAttrs,this.a11yAttrs,this.ptmi(`root`,this.ptParams))},asAttrs:function(){return this.as===`BUTTON`?{type:`button`,disabled:this.$pcAccordionPanel.disabled}:void 0},a11yAttrs:function(){return{id:this.id,tabindex:this.$pcAccordion.tabindex,"aria-expanded":this.$pcAccordionPanel.active,"aria-controls":this.ariaControls,"data-pc-name":`accordionheader`,"data-p-disabled":this.$pcAccordionPanel.disabled,"data-p-active":this.$pcAccordionPanel.active,onFocus:this.onFocus,onKeydown:this.onKeydown}},ptParams:function(){return{context:{active:this.$pcAccordionPanel.active}}},dataP:function(){return e({active:this.$pcAccordionPanel.active})}},components:{ChevronUpIcon:O,ChevronDownIcon:E},directives:{ripple:t}};function P(e,t,n,i,a,o){var c=w(`ripple`);return e.asChild?T(e.$slots,`default`,{key:1,class:d(e.cx(`root`)),active:o.$pcAccordionPanel.active,a11yAttrs:o.a11yAttrs,onClick:o.onClick}):r((u(),x(s(e.as),m({key:0,"data-p":o.dataP,class:e.cx(`root`),onClick:o.onClick},o.attrs),{default:_(function(){return[T(e.$slots,`default`,{active:o.$pcAccordionPanel.active}),T(e.$slots,`toggleicon`,{active:o.$pcAccordionPanel.active,class:d(e.cx(`toggleicon`))},function(){return[o.$pcAccordionPanel.active?(u(),x(s(o.$pcAccordion.$slots.collapseicon?o.$pcAccordion.$slots.collapseicon:o.$pcAccordion.collapseIcon?`span`:`ChevronUpIcon`),m({key:0,class:[o.$pcAccordion.collapseIcon,e.cx(`toggleicon`)],"aria-hidden":`true`},e.ptm(`toggleicon`,o.ptParams)),null,16,[`class`])):(u(),x(s(o.$pcAccordion.$slots.expandicon?o.$pcAccordion.$slots.expandicon:o.$pcAccordion.expandIcon?`span`:`ChevronDownIcon`),m({key:1,class:[o.$pcAccordion.expandIcon,e.cx(`toggleicon`)],"aria-hidden":`true`},e.ptm(`toggleicon`,o.ptParams)),null,16,[`class`]))]})]}),_:3},16,[`data-p`,`class`,`onClick`])),[[c]])}N.render=P;var F=p.extend({name:`accordionpanel`,classes:{root:function(e){var t=e.instance,n=e.props;return[`p-accordionpanel`,{"p-accordionpanel-active":t.active,"p-disabled":n.disabled}]}}}),I={name:`AccordionPanel`,extends:{name:`BaseAccordionPanel`,extends:n,props:{value:{type:[String,Number],default:void 0},disabled:{type:Boolean,default:!1},as:{type:[String,Object],default:`DIV`},asChild:{type:Boolean,default:!1}},style:F,provide:function(){return{$pcAccordionPanel:this,$parentInstance:this}}},inheritAttrs:!1,inject:[`$pcAccordion`],computed:{active:function(){return this.$pcAccordion.isItemActive(this.value)},attrs:function(){return m(this.a11yAttrs,this.ptmi(`root`,this.ptParams))},a11yAttrs:function(){return{"data-pc-name":`accordionpanel`,"data-p-disabled":this.disabled,"data-p-active":this.active}},ptParams:function(){return{context:{active:this.active}}}}};function L(e,t,n,r,i,a){return e.asChild?T(e.$slots,`default`,{key:1,class:d(e.cx(`root`)),active:a.active,a11yAttrs:a.a11yAttrs}):(u(),x(s(e.as),m({key:0,class:e.cx(`root`)},a.attrs),{default:_(function(){return[T(e.$slots,`default`)]}),_:3},16,[`class`]))}I.render=L;var R=p.extend({name:`accordion`,style:`
    .p-accordionpanel {
        display: flex;
        flex-direction: column;
        border-style: solid;
        border-width: dt('accordion.panel.border.width');
        border-color: dt('accordion.panel.border.color');
    }

    .p-accordionheader {
        all: unset;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: dt('accordion.header.padding');
        color: dt('accordion.header.color');
        background: dt('accordion.header.background');
        border-style: solid;
        border-width: dt('accordion.header.border.width');
        border-color: dt('accordion.header.border.color');
        font-weight: dt('accordion.header.font.weight');
        border-radius: dt('accordion.header.border.radius');
        transition:
            background dt('accordion.transition.duration'),
            color dt('accordion.transition.duration'),
            outline-color dt('accordion.transition.duration'),
            box-shadow dt('accordion.transition.duration');
        outline-color: transparent;
    }

    .p-accordionpanel:first-child > .p-accordionheader {
        border-width: dt('accordion.header.first.border.width');
        border-start-start-radius: dt('accordion.header.first.top.border.radius');
        border-start-end-radius: dt('accordion.header.first.top.border.radius');
    }

    .p-accordionpanel:last-child > .p-accordionheader {
        border-end-start-radius: dt('accordion.header.last.bottom.border.radius');
        border-end-end-radius: dt('accordion.header.last.bottom.border.radius');
    }

    .p-accordionpanel:last-child.p-accordionpanel-active > .p-accordionheader {
        border-end-start-radius: dt('accordion.header.last.active.bottom.border.radius');
        border-end-end-radius: dt('accordion.header.last.active.bottom.border.radius');
    }

    .p-accordionheader-toggle-icon {
        color: dt('accordion.header.toggle.icon.color');
    }

    .p-accordionpanel:not(.p-disabled) .p-accordionheader:focus-visible {
        box-shadow: dt('accordion.header.focus.ring.shadow');
        outline: dt('accordion.header.focus.ring.width') dt('accordion.header.focus.ring.style') dt('accordion.header.focus.ring.color');
        outline-offset: dt('accordion.header.focus.ring.offset');
    }

    .p-accordionpanel:not(.p-accordionpanel-active):not(.p-disabled) > .p-accordionheader:hover {
        background: dt('accordion.header.hover.background');
        color: dt('accordion.header.hover.color');
    }

    .p-accordionpanel:not(.p-accordionpanel-active):not(.p-disabled) .p-accordionheader:hover .p-accordionheader-toggle-icon {
        color: dt('accordion.header.toggle.icon.hover.color');
    }

    .p-accordionpanel:not(.p-disabled).p-accordionpanel-active > .p-accordionheader {
        background: dt('accordion.header.active.background');
        color: dt('accordion.header.active.color');
    }

    .p-accordionpanel:not(.p-disabled).p-accordionpanel-active > .p-accordionheader .p-accordionheader-toggle-icon {
        color: dt('accordion.header.toggle.icon.active.color');
    }

    .p-accordionpanel:not(.p-disabled).p-accordionpanel-active > .p-accordionheader:hover {
        background: dt('accordion.header.active.hover.background');
        color: dt('accordion.header.active.hover.color');
    }

    .p-accordionpanel:not(.p-disabled).p-accordionpanel-active > .p-accordionheader:hover .p-accordionheader-toggle-icon {
        color: dt('accordion.header.toggle.icon.active.hover.color');
    }

    .p-accordioncontent {
        display: grid;
        grid-template-rows: 1fr;
    }

    .p-accordioncontent-wrapper {
        min-height: 0;
    }

    .p-accordioncontent-content {
        border-style: solid;
        border-width: dt('accordion.content.border.width');
        border-color: dt('accordion.content.border.color');
        background-color: dt('accordion.content.background');
        color: dt('accordion.content.color');
        padding: dt('accordion.content.padding');
    }
`,classes:{root:`p-accordion p-component`}}),z={name:`Accordion`,extends:{name:`BaseAccordion`,extends:n,props:{value:{type:[String,Number,Array],default:void 0},multiple:{type:Boolean,default:!1},lazy:{type:Boolean,default:!1},tabindex:{type:Number,default:0},selectOnFocus:{type:Boolean,default:!1},expandIcon:{type:String,default:void 0},collapseIcon:{type:String,default:void 0},activeIndex:{type:[Number,Array],default:null}},style:R,provide:function(){return{$pcAccordion:this,$parentInstance:this}}},inheritAttrs:!1,emits:[`update:value`,`update:activeIndex`,`tab-open`,`tab-close`,`tab-click`],data:function(){return{d_value:this.value}},watch:{value:function(e){this.d_value=e},activeIndex:{immediate:!0,handler:function(e){this.hasAccordionTab&&(this.d_value=this.multiple?e?.map(String):e?.toString())}}},methods:{isItemActive:function(e){return this.multiple?this.d_value?.includes(e):this.d_value===e},updateValue:function(e){var t=this.isItemActive(e);this.multiple?t?this.d_value=this.d_value.filter(function(t){return t!==e}):this.d_value?this.d_value.push(e):this.d_value=[e]:this.d_value=t?null:e,this.$emit(`update:value`,this.d_value),this.$emit(`update:activeIndex`,this.multiple?this.d_value?.map(Number):Number(this.d_value)),this.$emit(t?`tab-close`:`tab-open`,{originalEvent:void 0,index:Number(e)})},isAccordionTab:function(e){return e.type.name===`AccordionTab`},getTabProp:function(e,t){return e.props?e.props[t]:void 0},getKey:function(e,t){return this.getTabProp(e,`header`)||t},getHeaderPT:function(e,t){var n=this;return{root:m({onClick:function(e){return n.onTabClick(e,t)}},this.getTabProp(e,`headerProps`),this.getTabPT(e,`header`,t)),toggleicon:m(this.getTabProp(e,`headeractionprops`),this.getTabPT(e,`headeraction`,t))}},getContentPT:function(e,t){return{root:m(this.getTabProp(e,`contentProps`),this.getTabPT(e,`toggleablecontent`,t)),transition:this.getTabPT(e,`transition`,t),content:this.getTabPT(e,`content`,t)}},getTabPT:function(e,t,n){var r=this.tabs.length,i={props:e.props||{},parent:{instance:this,props:this.$props,state:this.$data},context:{index:n,count:r,first:n===0,last:n===r-1,active:this.isItemActive(`${n}`)}};return m(this.ptm(`accordiontab.${t}`,i),this.ptmo(this.getTabProp(e,`pt`),t,i))},onTabClick:function(e,t){this.$emit(`tab-click`,{originalEvent:e,index:t})}},computed:{tabs:function(){var e=this;return this.$slots.default().reduce(function(t,n){return e.isAccordionTab(n)?t.push(n):n.children&&n.children instanceof Array&&n.children.forEach(function(n){e.isAccordionTab(n)&&t.push(n)}),t},[])},hasAccordionTab:function(){return this.tabs.length}},components:{AccordionPanel:I,AccordionHeader:N,AccordionContent:A,ChevronUpIcon:O,ChevronRightIcon:D}};function B(e,t,n,r,i,a){var o=f(`AccordionHeader`),c=f(`AccordionContent`),p=f(`AccordionPanel`);return u(),y(`div`,m({class:e.cx(`root`)},e.ptmi(`root`)),[a.hasAccordionTab?(u(!0),y(l,{key:0},C(a.tabs,function(t,n){return u(),x(p,{key:a.getKey(t,n),value:`${n}`,pt:{root:a.getTabPT(t,`root`,n)},disabled:a.getTabProp(t,`disabled`)},{default:_(function(){return[b(o,{class:d(a.getTabProp(t,`headerClass`)),pt:a.getHeaderPT(t,n)},{toggleicon:_(function(r){return[r.active?(u(),x(s(e.$slots.collapseicon?e.$slots.collapseicon:e.collapseIcon?`span`:`ChevronDownIcon`),m({key:0,class:[e.collapseIcon,r.class],"aria-hidden":`true`},{ref_for:!0},a.getTabPT(t,`headericon`,n)),null,16,[`class`])):(u(),x(s(e.$slots.expandicon?e.$slots.expandicon:e.expandIcon?`span`:`ChevronUpIcon`),m({key:1,class:[e.expandIcon,r.class],"aria-hidden":`true`},{ref_for:!0},a.getTabPT(t,`headericon`,n)),null,16,[`class`]))]}),default:_(function(){return[t.children&&t.children.headericon?(u(),x(s(t.children.headericon),{key:0,isTabActive:a.isItemActive(`${n}`),active:a.isItemActive(`${n}`),index:n},null,8,[`isTabActive`,`active`,`index`])):v(``,!0),t.props&&t.props.header?(u(),y(`span`,m({key:1,ref_for:!0},a.getTabPT(t,`headertitle`,n)),S(t.props.header),17)):v(``,!0),t.children&&t.children.header?(u(),x(s(t.children.header),{key:2})):v(``,!0)]}),_:2},1032,[`class`,`pt`]),b(c,{pt:a.getContentPT(t,n)},{default:_(function(){return[(u(),x(s(t)))]}),_:2},1032,[`pt`])]}),_:2},1032,[`value`,`pt`,`disabled`])}),128)):T(e.$slots,`default`,{key:1})],16)}z.render=B;var V=p.extend({name:`accordiontab`}),H={name:`AccordionTab`,extends:{name:`BaseAccordionTab`,extends:n,props:{header:null,headerStyle:null,headerClass:null,headerProps:null,headerActionProps:null,contentStyle:null,contentClass:null,contentProps:null,disabled:Boolean},style:V,provide:function(){return{$pcAccordionTab:this,$parentInstance:this}}},inheritAttrs:!1,mounted:function(){console.warn(`Deprecated since v4. Use the new structure of Accordion instead.`)}};function U(e,t,n,r,i,a){return T(e.$slots,`default`)}H.render=U;export{z as n,H as t};