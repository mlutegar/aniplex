import { Component } from '@angular/core';
import { Router, NavigationEnd } from '@angular/router';


@Component({
  selector: 'app-root',
  templateUrl: 'app.component.html',
  styleUrls: ['app.component.scss'],
})
export class AppComponent {
  constructor(private router: Router) { }
  currentPage!: string;

  ngOnInit() {
    this.router.events.subscribe((event) => {
      if (event instanceof NavigationEnd) {
        this.currentPage = event.url; // ou event.url se preferir a URL atual sem redirecionamentos
        console.log('Valor da currentPage:', this.currentPage);
      }
    });
  }

}
