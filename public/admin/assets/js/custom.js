/*
=========================================
|                                       |
|       Sidebar avtive items            |
|                                       |
=========================================
*/

const pages = document.querySelectorAll(".menu-categories li");

pages.forEach((item, key) => {
    if(item.getAttribute('data-active') == window.location.href) {
        active_item(item);
		active_parent_item(item);
        show_parent_menu(item);
    }
    else {
        active_item(pages[key]);
    }
})

function active_item (element) {
    pages.forEach((item) => {
        item.classList.remove('active');
    });

    document.querySelectorAll(".menu-categories ul").forEach((item) => {
        item.classList.remove('show');
    });

    element.classList.add('active');
    active_parent_item(element);
}

function active_parent_item (element) {  // active all item parents items 
    var parent = element.parentElement;
    if(parent.classList.contains('menu-categories')) {
        return;
    }

    if(parent.classList.contains('menu')) {
        parent.classList.add('active');
    }
    active_parent_item(parent);
}

function show_parent_menu (element) {  // show all item parents menus 
    var parent = element.parentElement;
    if(parent.classList.contains('menu')) {
        return;
    }

    if(parent.classList.contains('submenu') || parent.classList.contains('sub-submenu')) {
        parent.classList.add('show');
    }
    show_parent_menu(parent);
}

/*
=========================================
|                                       |
|       Multi-Check checkbox            |
|                                       |
=========================================
*/

function checkall(clickchk, relChkbox) {

    var checker = $('#' + clickchk);
    var multichk = $('.' + relChkbox);


    checker.click(function () {
        multichk.prop('checked', $(this).prop('checked'));
    });
}


/*
=========================================
|                                       |
|           MultiCheck                  |
|                                       |
=========================================
*/

/*
    This MultiCheck Function is recommanded for datatable
*/

function multiCheck(tb_var) {
    tb_var.on("change", ".chk-parent", function() {
        var e=$(this).closest("table").find("td:first-child .child-chk"), a=$(this).is(":checked");
        $(e).each(function() {
            a?($(this).prop("checked", !0), $(this).closest("tr").addClass("active")): ($(this).prop("checked", !1), $(this).closest("tr").removeClass("active"))
        })
    }),
    tb_var.on("change", "tbody tr .new-control", function() {
        $(this).parents("tr").toggleClass("active")
    })
}