import MobileMenu from './modules/MobileMenu';
import PrivacyPolicySection from './modules/PrivacyPolicySection';
import Hero from './blocks/Hero';
import VimeoPlayer from './blocks/VimeoPlayer';
import ContentSlider from './blocks/ContentSlider';
import Media from './blocks/Media';
import Testimonials from './blocks/Testimonials';
import Credits from './blocks/Credits';
import Audio from './blocks/Audio';
import VideoSeries from './blocks/VideoSeries';
import Journal from './modules/Journal';
import Effects from './modules/Effects';
import nProgress from 'nprogress';
import Lottie from 'lottie-web';

nProgress.configure({
  showSpinner: false,
  easing: 'ease-in-out',
  speed: 500,
  trickleSpeed: 10,
});

const innerLinks = [...document.querySelectorAll('a')].filter(
  (link) =>
    link.target != '_blank' &&
    !link.href.includes('mailto') &&
    !link.href.includes('#') &&
    link.dataset.category != 'visuals'
);

window.DOMContentLoaded = nProgress.start();
window.onload = () => {
  nProgress.done();
  setTimeout(() => {
    document.body.classList.add('loaded');
  }, 500);
};

innerLinks.forEach((link) => {
  link.addEventListener('click', (e) => {
    if (e.metaKey || e.ctrlKey) return;
    nProgress.start();
    document.body.classList.remove('loaded');
  });
});

const mobileMenu = new MobileMenu();
const hero = new Hero();
const instagramFeed = new ContentSlider();
const mediaBlockCarousel = new Media();
const testimonials = new Testimonials();
const credits = new Credits();
const effects = new Effects();

const journalCategories = document.querySelector('.journal__categories');

if (journalCategories) {
  const journal = new Journal();
}

document
  .querySelectorAll('.vimeo-player-custom-controls')
  .forEach((wrapper) => {
    new VimeoPlayer(wrapper);
  });

document.querySelectorAll('.block-audio__player').forEach((player) => {
  new Audio(player);
});

if (document.querySelector('.block-video-series')) {
  const videoSeries = new VideoSeries();
}

document.querySelectorAll('.align-bottom--offset').forEach((block) => {
  block.closest('section').classList.add('offset-bottom');
});

const heroAltReadMore = document.querySelector(
  '.block-hero-case_study__read-more'
);

if (heroAltReadMore) {
  const toggleSlide = (element, button) => {
    /** Slide down. */
    if (!element.classList.contains('active')) {
      /** Show the element. */
      element.classList.add('active');
      element.style.height = 'auto';

      /** Get the computed height of the element. */
      let height = `${element.clientHeight}px`;

      /** Set the height of the content as 0px, */
      /** so we can trigger the slide down animation. */
      element.style.height = '0px';
      button.innerHTML = `Read Less -`;
      /** Do this after the 0px has applied. */
      /** It's like a delay or something. MAGIC! */
      setTimeout(() => {
        element.style.height = height;
      }, 0);

      /** Slide up. */
    } else {
      /** Set the height as 0px to trigger the slide up animation. */
      element.style.height = '0px';
      button.innerHTML = `Read More +`;

      /** Remove the `active` class when the animation ends. */
      element.addEventListener(
        'transitionend',
        () => {
          element.classList.remove('active');
          element.removeAttribute('style');
        },
        { once: true }
      );
    }
  };
  const heroAltReadMoreBtn = heroAltReadMore.querySelector('.read-more-btn');
  const heroAltReadMoreText = heroAltReadMore.querySelector('p');

  heroAltReadMoreBtn.addEventListener('click', () =>
    toggleSlide(heroAltReadMoreText, heroAltReadMoreBtn)
  );
}

if (document.body.classList.contains('page-template-page-privacy_policy')) {
  const privacyPolicySections = document.querySelectorAll('.content-section');

  privacyPolicySections.forEach((section) => {
    new PrivacyPolicySection(section);
    window.addEventListener('resize', () => {
      const width =
        window.innerWidth ||
        document.documentElement.clientWidth ||
        document.body.clientWidth;
      if (width <= 599) {
        new PrivacyPolicySection(section).toggleSlide;
      } else {
        new PrivacyPolicySection(section).toggleShow;
      }
    });
  });
}

if (document.body.classList.contains('privacy-policy')) {
  const privacyPolicyLink = document.querySelector('a[href*="privacy-policy"]');
  privacyPolicyLink.classList.add('link-active');
}

const teamMembers = document.querySelectorAll('.team-member');
teamMembers.forEach((card) => {
  if (teamMembers && document.body.classList.contains('is-mobile')) {
    const panel = card.querySelector('.card-back .image-frame');
    const panelName = panel.dataset.name;
    let anim = Lottie.loadAnimation({
      container: panel,
      renderer: 'svg',
      loop: false,
      autoplay: false,
      path: `${root.siteurl}/wp-content/themes/duke-duck/assets/lottie/${panelName}.json`,
    });
    card.addEventListener('touchstart', () => {
      card.classList.toggle('flipped');
      if (!card.classList.contains('flipped')) {
        setTimeout(() => {
          anim.stop();
        }, 500);
      } else {
        setTimeout(() => {
          anim.play();
        }, 500);
      }
    });
  } else if (teamMembers && !document.body.classList.contains('is-mobile')) {
    const panel = card.querySelector('.card-front .image-frame');
    const panelName = panel.dataset.name;
    let anim = Lottie.loadAnimation({
      container: panel,
      renderer: 'svg',
      loop: false,
      autoplay: false,
      path: `${root.siteurl}/wp-content/themes/duke-duck/assets/lottie/${panelName}.json`,
    });

    card.addEventListener('mouseenter', () => {
      card.classList.add('mouse-over');
      anim.play();
    });

    card.addEventListener('mouseleave', () => {
      card.classList.remove('mouse-over');
      setTimeout(() => {
        anim.stop();
      }, 500);
    });
  }
});

// lottie
const observerOptions = {
  root: null,
  rootMargin: '-40% 0px -40% 0px',
  threshold: 0,
};

const graphicElements = [...document.querySelectorAll('.graphic-element')];
graphicElements.forEach((element) => {
  const graphicElementName = element.dataset.name;

  let anim = Lottie.loadAnimation({
    container: element,
    renderer: 'svg',
    loop: false,
    autoplay: false,
    path: `${root.siteurl}/wp-content/themes/duke-duck/assets/lottie/flourish_${graphicElementName}.json`,
  });

  anim.addEventListener('config_ready', () => {
    let rotate;
    let flipx;
    let flipy;
    let movex;
    let movey;

    element.dataset.rotate ? (rotate = element.dataset.rotate) : (rotate = 0);
    element.dataset.flipx ? (flipx = 180) : (flipx = 0);
    element.dataset.flipy ? (flipy = 180) : (flipy = 0);
    element.dataset.movex ? (movex = element.dataset.movex) : (movex = 0);
    element.dataset.movey ? (movey = element.dataset.movey) : (movey = 0);

    element.querySelector(
      'svg'
    ).style.transform = `rotateY(${flipy}deg) rotateX(${flipx}deg) rotate(${rotate}deg)`;

    element.querySelector('svg').style.position = `relative`;
    element.querySelector('svg').style.left = `${movex}px`;
    element.querySelector('svg').style.top = `${movey}px`;
  });

  if (!anim.wrapper.classList.contains('graphic-element--animate'))
    anim.addEventListener('config_ready', () => {
      anim.goToAndStop(anim.totalFrames, true);
    });

  if (anim.wrapper.classList.contains('animation-autoplay')) {
    window.onload = () => {
      nProgress.done();
      setTimeout(() => {
        document.body.classList.add('loaded');
        anim.play();
      }, 500);
    };
  }

  const lottieAnimate = (entries) => {
    entries.forEach((entry) => {
      if (
        (entry.isIntersecting &&
          !entry.target.classList.contains('animation-autoplay')) ||
        entry.target.parentElement.parentElement.classList.contains(
          'swiper-slide-active'
        )
      ) {
        anim.play();
      } else if (
        !entry.target.parentElement.parentElement.classList.contains(
          'swiper-slide-active'
        ) &&
        entry.target.parentElement.parentElement.classList.contains(
          'swiper-slide'
        )
      ) {
        anim.stop();
      }
    });
  };

  const lottieObserver = new IntersectionObserver(
    lottieAnimate,
    observerOptions
  );

  lottieObserver.observe(element);
});

// const graphicCircles = [...document.querySelectorAll('.graphic-circle')];

// if (graphicCircles) {
//   function setCircleWidth(element) {
//     const titleContainer = element.parentElement;
//     titleContainer.style.display = 'inline';
//     const titleContainerWidth = titleContainer.offsetWidth;
//     element.style.width = `${
//       titleContainerWidth + 0.2 * titleContainerWidth
//     }px`;
//   }
//   graphicCircles.forEach((graphic) => {
//     setCircleWidth(graphic);

//     window.addEventListener('resize', () => {
//       setCircleWidth(graphic);
//     });
//   });
// }
