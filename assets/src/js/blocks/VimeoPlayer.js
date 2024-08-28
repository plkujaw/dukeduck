import Vimeo from '@vimeo/player';

class VimeoPlayer {
  constructor(wrapper) {
    this.wrapper = wrapper;
    this.iframe = wrapper.querySelector('iframe');
    this.ctrlBtn = wrapper.querySelector('.js-video-ctrl');
    this.player = new Vimeo(this.iframe);
    this.autoplay = this.wrapper.classList.contains('video-autoplay');
    this.observerOptions = {
      root: null,
      rootMargin: '-10% 0px -10% 0px',
      threshold: 0,
    };

    this.observer = new IntersectionObserver(
      this.autoPlay,
      this.observerOptions
    );

    this.events();
  }

  events() {
    if (!this.ctrlBtn && !this.autoplay) {
      this.wrapper.addEventListener('mouseenter', () => this.playVideo());
      this.wrapper.addEventListener('mouseleave', () => this.stopVideo());
      this.wrapper.addEventListener('touchstart', () => {
        this.player.getPaused().then((paused) => {
          if (!paused) {
            this.pauseVideo();
          } else {
            this.playVideo();
          }
        });
      });
    } else if (
      this.ctrlBtn &&
      !this.wrapper.parentNode.parentNode.classList.contains(
        'block-journal-post__media'
      )
    ) {
      this.ctrlBtn.addEventListener('click', () => {
        this.ctrlBtn.classList.toggle('video-ctrl--playing');
        this.player.getPaused().then((paused) => {
          if (!paused) {
            this.pauseVideo();
          } else {
            this.playVideo();
            setTimeout(() => {
              this.ctrlBtn.classList.add('video-ctrl--hide');
            }, 1000);
          }
        });
      });
      this.wrapper.addEventListener('click', (e) => {
        if (e.target.parentNode.parentNode !== this.ctrlBtn) {
          this.ctrlBtn.classList.toggle('video-ctrl--hide');
        }
      });
    }

    if (this.autoplay) {
      this.observer.observe(this.iframe);
    }
  }

  playVideo() {
    this.player.play();
  }

  pauseVideo() {
    this.player.pause();
  }

  stopVideo() {
    this.player.pause();
    this.player.setCurrentTime(0);
  }

  autoPlay(entry) {
    const iframe = entry[0];
    const player = new Vimeo(iframe.target);
    if (iframe.isIntersecting) {
      player.play();
    } else {
      player.pause();
    }
  }
}

export default VimeoPlayer;
