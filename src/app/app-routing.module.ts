import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  {
    path: 'home',
    loadChildren: () => import('./home/home.module').then( m => m.HomePageModule)
  },
  {
    path: '',
    redirectTo: '',
    pathMatch: 'full'
  },
  {
    path: 'models',
    loadChildren: () => import('./models/models.module').then( m => m.ModelsPageModule)
  },
  {
    path: 'modal',
    loadChildren: () => import('./modal/modal.module').then( m => m.ModalPageModule)
  },
  {
    path: '',
    loadChildren: () => import('./login/login.module').then( m => m.LoginPageModule)
  },
  {
    path: 'musicas',
    loadChildren: () => import('./musicas/musicas.module').then( m => m.MusicasPageModule)
  },
  {
    path: 'jogos',
    loadChildren: () => import('./jogos/musicas.module').then( m => m.MusicasPageModule)
  },
  {
    path: 'animes',
    loadChildren: () => import('./animes/musicas.module').then( m => m.MusicasPageModule)
  },
  {
    path: 'mangas',
    loadChildren: () => import('./mangas/musicas.module').then( m => m.MusicasPageModule)
  },

];

@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })
  ],
  exports: [RouterModule]
})
export class AppRoutingModule { }
