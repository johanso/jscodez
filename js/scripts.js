document.addEventListener('DOMContentLoaded', () => {
  initPageFunctionalities();
  window.addEventListener("scroll", handleScroll);
});

const initPageFunctionalities = () => {
  const menuToggle = document.querySelector('#menu-icon');
  const menuTop = document.querySelector('#menu-top');
  const mediaQuery = window.matchMedia('(max-width: 768px)');
  const body = document.querySelector('body');
  const sidebarFloat = document.querySelector('#sidebar-float');
  const sidebarWidget = document.querySelector('.sidebar__widget');
  const backdrop = document.querySelector('.backdrop');
  const accordionTitles = document.querySelectorAll('.sidebar__widget .menu > .menu-item');
  const goTop = document.querySelector(".goto-top");

  // Menu Responsive
  menuToggle.addEventListener('click', () => {
    menuToggle.classList.toggle('active');
    menuTop.classList.toggle('active');
  });

  window.addEventListener('resize', () => {
    if(!mediaQuery.matches) {
      menuToggle.classList.remove('active');
      menuTop.classList.remove('active');
    }
  });

  // Sidebar Responsive
  if ( sidebarFloat && sidebarWidget && mediaQuery.matches ) {
    sidebarFloat.addEventListener('click', () => {
      sidebarWidget.classList.toggle('active');
      sidebarFloat.classList.toggle('active');
      body.classList.toggle('no-scroll');
      backdrop.classList.toggle('active');
      menuToggle.classList.toggle('hide');
    });

    backdrop.addEventListener('click', () => {
      sidebarWidget.classList.remove('active');
      sidebarFloat.classList.remove('active');
      body.classList.remove('no-scroll');
      backdrop.classList.remove('active');
      menuToggle.classList.remove('hide');
    });
  }

  // Accordion Sidebar
  accordionTitles.forEach(title => {
    const itemActive = title.querySelector('.sub-menu .current-menu-item');
    if (itemActive) {
      title.classList.add('active');
      const subMenu = title.querySelector('.sub-menu');
      subMenu.style.maxHeight = subMenu.scrollHeight + "px";
    }
  })

  accordionTitles.forEach(title => {
    title.addEventListener('click', () => {
      title.classList.toggle('active');

      const subMenu = title.querySelector('.sub-menu');
      if (subMenu) {
        if (title.classList.contains('active')) {
          subMenu.style.maxHeight = subMenu.scrollHeight + "px";
        } else {
          subMenu.style.maxHeight = null;
        }
      }

      accordionTitles.forEach(item => {
        if (item !== title && item.classList.contains('active')) {
          item.classList.remove('active');
          const otherSubMenu = item.querySelector('.sub-menu');
          if (otherSubMenu) {
            otherSubMenu.style.maxHeight = null;
          }
        }
      });
    });
  });
  
  // Go to top
  goTop.addEventListener("click", () => {
    window.scroll({
      top: 0,
      behavior: 'smooth'
    })
  })
}

const handleScroll = () => {
  let prevScrollPos = window.scrollY || window.pageYOffset;
  const header = document.querySelector(".header");
  const goTop = document.querySelector(".goto-top");
  const sidebarFloat = document.querySelector("#sidebar-float");

  window.addEventListener("scroll", function() {
    const currentScrollPos = window.scrollY || window.pageYOffset;

    if (prevScrollPos < currentScrollPos) {
      header.classList.add("hidden");
      header.classList.remove("visible");
      goTop.classList.remove("visible");
    } else {
      header.classList.add("visible");
      header.classList.remove("hidden");
      goTop.classList.add("visible");
    }

    if (sidebarFloat) {
      if (prevScrollPos < currentScrollPos) {
        sidebarFloat.classList.add("hidden");
      } else {
        sidebarFloat.classList.remove("hidden");
      }
    }

    prevScrollPos = currentScrollPos;

    // Mostrar u ocultar goTop basado en la posición del scroll
    if (currentScrollPos < 1) {
      goTop.style.opacity = "0";
    } else {
      goTop.style.opacity = "1";
    }
  });

  // Al inicio, verificar posición del scroll para mostrar u ocultar goTop
  const initialScrollPos = window.scrollY || window.pageYOffset;
  if (initialScrollPos < 1) {
    goTop.style.opacity = "0";
  } else {
    goTop.style.opacity = "1";
  }
};
