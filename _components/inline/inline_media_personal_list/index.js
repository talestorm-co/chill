(function () {
    var H = null, MC = '<?=$this->MC?>', MD = '<?=$this->MD?>', FQCN = '<?=$this->fqcn?>';
    //<editor-fold defaultstate="collapsed" desc="Импорт">
    var Y = window.Eve.EFO.Com();
    var imports = [
        Y.css('/assets/css/advt.css'),
        Y.js('/assets/js/ET/ADVTable/advt.js')
    ];
    //</editor-fold>    
    function initPlugin() {
        //<editor-fold defaultstate="collapsed" desc="Инициализация">
        var E = window.Eve, EFO = E.EFO, U = EFO.U, PAR = EFO.flatController, PARP = PAR.prototype, APS = Array.prototype.slice, ADVT = E.ADVTable;
        var TPLS = null;
        /*<?=$this->build_templates('TPLS')?>*/
        EFO.TemplateManager().addObject(TPLS, MC); // префикс класса
        var STYLE = null;
        /*<?=$this->create_style("{$this->MC}",'STYLE')?>*/
        EFO.SStyleDriver().registerStyleOInstall(STYLE);
        var SVG = null;
        /*<?=$this->create_svg('SVG')?>*/
        EFO.SVGDriver().register_svg(FQCN, MC, U.NEString(U.safeObject(SVG).svg, null));
        function F() {
            return  (F.is(this) ? this.init : F.F).apply(this, APS.call(arguments));
        }
        F.xInheritE(PAR);
        F.mixines = ['Roleable', 'Loaderable', 'Commandable', 'Monitorable'];
        U.initMixines(F);
        F.prototype.MD = MD;
        F.prototype.AL = null;
        F.prototype.ALA = null;
        //</editor-fold>        
        //<editor-fold defaultstate="collapsed" desc="Обвес">   '
        F.prototype.onInit = function (e_instance_id) {
            this.AL = {};
            e_instance_id = U.NEString(e_instance_id, null);
            e_instance_id ? 0 : U.Error("property editor requires instance id as parameter");
            this.instance_id = [MC, e_instance_id].join('_');
            PARP.onInit.apply(this, APS.call(arguments));
            this.get_instance_id = this._get_instance_id.bindToObject(this);
            this.init_table();
            this.handle.on('keydown', 'input', this.on_input_keydown.bindToObjectWParam(this));
            this.handle.on('focus', 'input', this.on_input_focus.bindToObjectWParam(this));
            this.load_metadata();
            return this;
        };
        F.prototype.load_metadata = function () {
            jQuery.getJSON('/Info/API', {action: "actor_role_list"})
                    .done(this.on_meta_responce.bindToObject(this));
            return this;
        };

        F.prototype.on_meta_responce = function (da) {
            if (U.isObject(da) && da.status === "ok") {
                var al = U.safeObject(da.actor_role_list);
                var nal = {};
                var nala = [];
                for (var k in al) {
                    if (al.hasOwnProperty(k) && U.NEString(al[k], null)) {
                        nal[k] = U.NEString(al[k], '');
                        nala.push({role_key: k, role_name: nal[k]});
                    }
                }
                this.AL = nal;
                this.ALA = nala;
                this.source ? this.source.setSource(this.source.source) : 0;
            }
            return this;
        };

        F.prototype.on_input_keydown = function (c, e) {
            if (e.keyCode === 38 || e.keyCode === 40 || e.keyCode === 13 || e.keyCode === 9) {
                var tt = jQuery(c);
                var dir = ((e.keyCode === 38 ? -1 : 1) * (e.shiftKey ? -1 : 1));
                var indexname = U.NEString(tt.data('indexName'), null);
                if (indexname) {
                    var indexvalue = U.IntMoreOr(tt.data('rowIndex'), null);
                    if (indexvalue !== null) {
                        var ni = indexvalue + dir;
                        if (ni > 0) {
                            var ne = this.handle.find('input[data-index-name=' + indexname + '][data-row-index=' + ni + ']');
                            if (ne && ne.length === 1) {
                                e.stopPropagation();
                                e.preventDefault ? e.preventDefault() : e.returnValue = false;
                                ne.focus();
                            }
                        }
                    }
                }
            }
            return this;
        };

        F.prototype.on_input_focus = function (c, e) {
            jQuery(c).select();
        };
        F.prototype._get_instance_id = function () {
            return this.instance_id;
        };
        F.prototype.getContentTemplate = function () {
            return EFO.TemplateManager().get([MC, 'Main'].join('.'));
        };
        F.prototype.getControllerAlias = function () {
            return MC;
        };
        F.prototype.getCssClass = function () {
            return MC;
        };

        //</editor-fold>   


        F.prototype.get_table_def = function () {
            return {
                id: this.instance_id,
                filters: false,
                sorter: false, //'SimpleLocal',
                paginator: false,
                perPage: [50, 100, 200, 500, 1000],
                rowKey: "int_id",
                css: MC,
                interceptClicks: false,
                columns: [
                    {id: "person_id", key: "person_id", property: "person_id", "text": "id", filter: false, sort: false, visible: false, hidden: true},
                    {id: "person_name", key: "person_name", property: "person_name", "text": "Имя", filter: false, sort: true},
                    {id: "value", key: "value", property: "value", "text": "Роль", filter: false, sort: false},
                    {id: "sort", key: "sort", property: "sort", "text": "sort", filter: false, sort: true},
                    {id: "control", key: "control", property: "control", "text": "control", filter: false, sort: false}
                ]
            };
        };
        F.prototype.init_table = function () {
            var def = this.get_table_def();
            var TMPLTS = null;
            /*<?=\ADVTable\TemplateBuilder\TemplateBuilder::F()->buildTemplatesRet(__DIR__,"TMPLTS","TPLS")?>*/
            ADVT.TemplateManager.LocalTemplateManager(this.instance_id, TMPLTS);
            this.table = ADVT.Table(def);

            this.table.addRenderer('getMC', function () {
                return MC;
            });
            this.table.addRenderer('getMD', function () {
                return MD;
            });

            this.table.addRenderer('available_roles', (function () {
                return U.safeArray(this.ALA);
            }).bindToObject(this));
            this.table.addRenderer('is_rolekey_current', (function (x) {
                return !!((x.role_key === this.selected_rolekey) && this.selected_rolekey);
            }).bindToObjectWParam(this));
            this.table.addRenderer('selected_rolekey', (function () {
                return this.selected_rolekey;
            }).bindToObject(this));

            this.table.addRenderer('selected_role_exists', (function () {
                return !!(U.NEString(U.safeObject(this.AL)[this.selected_rolekey], null));
            }).bindToObject(this));

            this.table.addRenderer('set_selected_role', (function (x) {                
                this.selected_rolekey = U.NEString(x.value, 'ROLE_ACTOR');
            }).bindToObjectWParam(this));

            this.table.addRenderer('row_index', (function () {
                this._row_index = U.IntMoreOr(this._row_index, 0, 0);
                this._row_index++;
                return this._row_index;
            }).bindToObject(this));
            this.table.addRenderer('repeat_row_index', (function () {
                this._row_index = U.IntMoreOr(this._row_index, 0, 0);
                return this._row_index;
            }).bindToObject(this));
            this.table.addRenderer('row_index2', (function () {
                this._row_index2 = U.IntMoreOr(this._row_index2, 0, 0);
                this._row_index2++;
                return this._row_index2;
            }).bindToObject(this));
            this.table.addRenderer('repeat_row_index2', (function () {
                this._row_index2 = U.IntMoreOr(this._row_index2, 0, 0);
                return this._row_index2;
            }).bindToObject(this));
            this.table.addRenderer('row_index3', (function () {
                this._row_index3 = U.IntMoreOr(this._row_index3, 0, 0);
                this._row_index3++;
                return this._row_index3;
            }).bindToObject(this));
            this.table.addRenderer('repeat_row_index3', (function () {
                this._row_index3 = U.IntMoreOr(this._row_index3, 0, 0);
                return this._row_index3;
            }).bindToObject(this));

            this.table.addSortMethod('property_name', function (data, dir) {
                data.sort(function (a, b) {
                    var aa = dir ? a : b;
                    var bb = dir ? b : a;
                    return aa.property_name < bb.property_name ? 1 : (aa.property_name > bb.property_name ? -1 : 0);
                });
            });
            this.table.addSortMethod('sort', function (data, dir) {
                data.sort(function (a, b) {
                    var aa = dir ? a : b;
                    var bb = dir ? b : a;
                    return aa.sort < bb.sort ? 1 : (aa.sort > bb.sort ? -1 : 0);
                });
            });

            this.source = ADVT.DataSource.ArrayDataSource(this.table.TableOptions);
            this.table.setDataSource(this.source);
            this.table.appendTo(this.getRole(MC + "Table").get(0));
            return this;
        };



        F.prototype.set_data = function (x) {
            x = U.safeArray(x);
            var dsa = [];
            for (var i = 0; i < x.length; i++) {
                if (U.isObject(x[i])) {
                    var pi = U.IntMoreOr(x[i].person_id, 0, null);
                    var pv = U.NEString(x[i].value, null);
                    var pn = U.NEString(x[i].name, null);
                    if (pn && pv && pi) {
                        dsa.push({uid: U.UUID(), person_id: pi, person_name: pn, value: pv, sort: U.IntOr(x[i].sort, 0)});
                    }
                }
            }
            dsa.sort(function (a, b) {
                var r = a.sort - b.sort;
                if (r === 0) {
                    r = a.person_id - b.person_id;
                    if (r === 0) {
                        r = a.value < b.value ? -1 : (a.value > b.value ? 1 : 0);
                    }
                }
                return r;
            });

            this.source.setSource(dsa);
            return this;
        };


        F.prototype.get_data = function () {
            return [].concat(this.source.source);
        };

        F.prototype.onCommandAdd_person = function () {
            this.showLoader();
            Y.load('selectors.media_person_selector')
                    .done(this, this.person_selector_ready)
                    .fail(this, this.onRequiredComponentFail)
                    .always(this, this.hideLoader);
            return this;
        };
        F.prototype.person_selector_ready = function (x) {
            x.set_allow_multi(true).show().load().setCallback(this, this.person_selector_done);
            return this;
        };

        F.prototype.person_selector_done = function (sel) {
            var sa = [];
            for (var i = 0; i < sel.length; i++) {
                var name = U.NEString(sel[i].name, null);
                var id = U.IntMoreOr(sel[i].id, 0, null);
                if (name && id) {
                    sa.push({uid: U.UUID(), person_id: id, person_name: name, value: "ROLE_ACTOR", sort: 0});
                }
            }
            if (sa.length) {
                var ssa = [].concat(this.source.source, sa);
                this.source.setSource(ssa);
                this.table.LayoutManager.getLayoutArea('scrollFixArea').scrollTop = 500000000;
            }
            return this;
        };

        F.prototype.onCommandPerson_remove = function (t) {            
            var uid = U.NEString(t.data('id'), null);
            if (uid) {
                var s = [].concat(this.source.source);
                var ns = [];
                for (var i = 0; i < s.length; i++) {
                    if (s[i].uid === uid) {
                        continue;
                    }
                    ns.push(s[i]);
                }
            }
            this.source.setSource(ns);
            return this;
        };

        F.prototype.get_by_uid = function (uid) {
            uid = U.NEString(uid, null);
            if (uid) {
                for (var i = 0; i < this.source.source.length; i++) {
                    if (this.source.source[i].uid === uid) {
                        return this.source.source[i];
                    }
                }

            }
            return null;
        };


        F.prototype.onMonitorRole = function (t) {           
            var uid = U.NEString(t.data('id'), null);
            if (uid) {
                var prop = this.get_by_uid(uid);
                if (prop) {
                    prop.value = U.NEString(t.val(), null);
                    t.val(U.NEString(prop.value, ''));
                }
            }
            return this;
        };
        F.prototype.onMonitorSort = function (t) {
            var uid = U.NEString(t.data('id'), null);
            if (uid) {
                var prop = this.get_by_uid(uid);
                if (prop) {
                    prop.sort = U.IntOr(t.val(), 0);
                    t.val(prop.sort);
                }
            }
            return this;
        };


        //<editor-fold defaultstate="collapsed" desc="клинер">
        F.prototype.clear = function () {
            this.source.setSource([]);
            this._row_index = 0;
            this._row_index2 = 0;
            this._row_index3 = 0;
            return this;
        };

        //</editor-fold>        

        //<editor-fold defaultstate="collapsed" desc="misc &&callback">
        F.prototype.onRequiredComponentFail = function () {
            U.TError("component load error");
        };
        Y.reportSuccess(FQCN, F);// конструктор, не инстанс
        //</editor-fold>
    }
    //<editor-fold defaultstate="collapsed" desc="dependecy resolver">
    if (imports.length) {
        window.Eve.EFO.EFOPromise.waitForArray(imports)
                .done(initPlugin)
                .fail(function () {
                    Y.report_fail(FQCN, "Ошибке при загрузке зависимости");
                });
    } else {
        initPlugin();
    }
    //</editor-fold>
})();