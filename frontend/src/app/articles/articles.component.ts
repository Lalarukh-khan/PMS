import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { ArticleService } from '../services/article.service';

@Component({
  selector: 'app-articles',
  templateUrl: './articles.component.html',
  styleUrls: ['./articles.component.sass']
})
export class ArticlesComponent implements OnInit {

  constructor(private articalService: ArticleService, private router: Router) { }

  articles: any;
  ngOnInit(): void {
    this.showArticles();
  }

  showArticles(){
    this.articles = this.articalService.listArticles().subscribe(article=>{
      this.articles = article;
      console.log(this.articles);
    });
  }
  deleteArticle(id:any){
    this.articalService.deleteArticle(id).subscribe(
      res => {
        this.articles = this.articles.filter((a:any) => a.id == id);
      });
      this.router.navigateByUrl('/');
  }
}
