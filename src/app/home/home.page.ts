import { Component } from '@angular/core';
import { DataService } from '../services/data.service';
import { AlertController, ModalController } from '@ionic/angular';
import { ModelsPage } from '../models/models.page';
import { ModalPage } from '../modal/modal.page';
import { AuthService } from '../services/auth.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {

  animes: any = [];

  constructor(private dataService: DataService, private alertCtrl: AlertController, private modalCtrl: ModalController, private authService: AuthService, private router: Router) {
    this.dataService.getAnimes().subscribe(res => {
      console.log(res);
      this.animes = res;
    })
  }

  async logout(){
    this.authService.logout();
    this.router.navigateByUrl('/' , {replaceUrl: true});
  }
}
