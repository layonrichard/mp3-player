import { secondsToMinutes } from "./utils.js";

export default {
  get() {
    this.cover = document.querySelector(".card-image");
    this.title = document.querySelector(".card-content h5");
    this.artist = document.querySelector(".artist");
    this.playPause = document.querySelector("#play-pause");
    this.mute = document.querySelector("#mute");
    this.volume = document.querySelector("#vol-control");
    this.seekbar = document.querySelector("#seekbar");
    this.currentDuration = document.querySelector("#current-duration");
    this.totalDuration = document.querySelector("#total-duration");
    this.playNext = document.querySelector("#play-next");
    this.playBefore = document.querySelector("#play-before");
    this.showList = document.querySelector("#song-list");
  },
  createAudioElement(audio) {
    this.audio = new Audio(audio);
  },
  actions() {
    this.playNext.onclick = () => this.next();
    this.playBefore.onclick = () => this.before();
    this.audio.ontimeupdate = () => this.timeUpdate();
    this.playPause.onclick = () => this.togglePlayPause();
    this.mute.onclick = () => this.setVolume(this.volume.value);
    this.volume.oninput = () => this.setVolume(this.volume.value);
    this.volume.onchange = () => this.setVolume(this.volume.value);
    this.seekbar.oninput = () => this.setSeek(this.seekbar.value);
    this.seekbar.onchange = () => this.setSeek(this.seekbar.value);
    this.seekbar.max = this.audio.duration;
    this.totalDuration.innerText = secondsToMinutes(this.audio.duration);
    this.showList.onclick = () => this.list();
  }
};