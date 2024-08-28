class Audio {
  constructor(player) {
    this.player = player;
    this.audio = player.querySelector('audio');
    this.playbackBtn = player.querySelector('.js-playback');
    this.progressBar = player.querySelector('.js-progress-bar');
    this.progressLine = player.querySelector('.js-progress-line');
    this.muteBtn = player.querySelector('.js-mute');
    this.events();
  }

  events() {
    this.audio.onloadedmetadata = () => {
      let timeleft = this.player.querySelector('.js-playback-time time'),
        duration = parseInt(this.audio.duration),
        s,
        m;
      s = duration % 60;
      m = Math.floor(duration / 60) % 60;
      s = s < 10 ? '0' + s : s;
      m = m < 10 ? '0' + m : m;
      timeleft.innerHTML = m + ':' + s;
    };

    this.playbackBtn.addEventListener('click', () => this.togglePlay());

    this.muteBtn.addEventListener('click', () => this.toggleMute());

    this.audio.addEventListener('timeupdate', () => this.currentTime());

    this.audio.addEventListener('timeupdate', () => {
      const percentage = (this.audio.currentTime / this.audio.duration) * 100;
      this.progressLine.style.width = `${percentage}%`;
    });

    this.progressBar.addEventListener('click', (e) => {
      const progressTime =
        (e.offsetX / this.progressBar.offsetWidth) * this.audio.duration;
      this.audio.currentTime = progressTime;
    });

    this.audio.onended = () => {
      this.playbackBtn.setAttribute('playing', false);
    };
  }

  //audio player

  togglePlay() {
    if (this.audio.paused) {
      this.audio.play();
      this.playbackBtn.setAttribute('playing', true);
    } else {
      this.audio.pause();
      this.playbackBtn.setAttribute('playing', false);
    }
  }

  toggleMute() {
    if (this.muteBtn.dataset.muted == 'false') {
      this.muteBtn.dataset.muted = 'true';
      this.audio.muted = true;
    } else {
      this.muteBtn.dataset.muted = 'false';
      this.audio.muted = false;
    }
  }

  currentTime() {
    let timeleft = this.player.querySelector('.js-playback-time time'),
      duration = parseInt(this.audio.duration),
      currentTime = parseInt(this.audio.currentTime),
      timeLeft = duration - currentTime,
      s,
      m;
    s = timeLeft % 60;
    m = Math.floor(timeLeft / 60) % 60;
    s = s < 10 ? '0' + s : s;
    m = m < 10 ? '0' + m : m;
    timeleft.innerHTML = m + ':' + s;
  }
}

export default Audio;
