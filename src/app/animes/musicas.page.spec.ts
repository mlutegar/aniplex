import { ComponentFixture, TestBed } from '@angular/core/testing';
import { MusicasPage } from './musicas.page';

describe('MusicasPage', () => {
  let component: MusicasPage;
  let fixture: ComponentFixture<MusicasPage>;

  beforeEach(async(() => {
    fixture = TestBed.createComponent(MusicasPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
