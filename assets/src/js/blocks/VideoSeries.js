import 'overlayscrollbars/overlayscrollbars.css';
import { OverlayScrollbars } from 'overlayscrollbars';

class VideoSeries {
  constructor() {
    this.episodesArray = episodes;
    
    this.episodeList = document.querySelector(
      '.block-video-series__episode-list'
    );

    this.customScrollbar = OverlayScrollbars(
      document.querySelector('.episodes-wrapper'),
      {}
    );

    this.episodeListItems = this.episodeList.querySelectorAll(' li');

    this.currentEpisode = document.querySelector('.js-current-episode');

    this.currentEpisodeNumber = document.querySelector(
      '.js-current-episode-number'
    );

    this.currentEpisodeTitle = document.querySelector(
      '.js-current-episode-title'
    );

    this.currentEpisodeVideo = document.querySelector(
      '.js-current-episode-video'
    );

    this.currentEpisodeDescription = document.querySelector(
      '.js-current-episode-description'
    );
    this.events();
  }

  events() {
    this.episodeListItems.forEach((episode, index) => {
      const episodeNumber = index + 1;
      episode.addEventListener('focus', () => {
        this.episodeListItems.forEach((ep) => {
          ep.dataset.current = false;
        });

        this.currentEpisode.dataset.episode = episodeNumber;
        episode.dataset.current = true;

        setTimeout(() => {
          this.currentEpisode.style.opacity = 0;
          setTimeout(() => {
            this.currentEpisodeNumber.textContent = `${episodeNumber} / ${this.episodeListItems.length}`;
            this.currentEpisodeTitle.innerHTML =
              this.episodesArray[index].episode_title;
            this.currentEpisodeDescription.innerHTML =
              this.episodesArray[index].episode_description;
            this.currentEpisodeVideo.innerHTML =
              this.episodesArray[index].episode_video;
            this.currentEpisode.style.opacity = 1; //fade back in
          }, 200); //this timeout needs to be the same as the transition speed
        });
      });
    });
  }
}

export default VideoSeries;
