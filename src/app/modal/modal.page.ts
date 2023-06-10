import { Component, Input, OnInit } from '@angular/core';
import { Animes, DataService } from '../services/data.service';
import { ModalController, ToastController } from '@ionic/angular';

@Component({
  selector: 'app-modal',
  templateUrl: './modal.page.html',
  styleUrls: ['./modal.page.scss'],
})
export class ModalPage implements OnInit {

  @Input() id!: string;

  animes: any = [];

  constructor(private dataService: DataService, private modalCtrl: ModalController, private toastCtrl: ToastController) {}

  ngOnInit() {
    this.dataService.getAnimesById(this.id).subscribe(res => {
      this.animes = res;
    });
  }

  async updateAnime(){
    this.dataService.updateAnime(this.animes);
    const toast = await this.toastCtrl.create({
      message: 'Anime atualizado',
      duration: 1000
    });
    toast.present();
  }

  async deleteAnime(){
    await this.dataService.deleteAnimes(this.animes);
    this.modalCtrl.dismiss();
  }

}
