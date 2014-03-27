<div ng-controller="newController">
	<ul class="nav nav-tabs nnav-justified">
		<li ng-class="{active:new.basicInfo.isActive}"><a href="">基本信息</a></li>	
		<li ng-class="{active:new.teamIntro.isActive}"><a href="">团队信息</a></li>	
		<li ng-class="{active:new.richInfo.isActive}"><a href="">可选补充</a></li>	
	</ul>
	<div class="row">
		<form class="col-md-6" >
			<div class="form-group">
				<label class="control-label text-success" for="newName">项目名称</label>
				<input class="form-control"type="text" ng-model="new.basicInfo.name" id="newName"/>
			</div>
			<div class="form-group">
				<label class="control-label">项目简介</label>
				<textarea class="form-control" rows="4" ng-model="new.basicInfo.intro" ></textarea>
			</div>
		</form>
	</div>
	<div class="row">
		<div class="col-md-6">
			<label class="control-label" for="newName">标签</label><br/>
			<ul class="andy-tags-ul">
				<!--tag-->
				<li ng-repeat="tag in new.tag.tags">
					<span class="label label-info" >
						<span ng-bind="tag"></span>
						<a href="" class="andy-remove-cross" ng-click="new.tag.removeTag(tag)"></a>
					</span>
				</li>
			</ul>
			<!--button for tag add-->
			<span class="label label-success andy-add-tag" ng-click="new .tag.focus()">
				<span class="glyphicon glyphicon-plus-sign"></span>
				<span class="andy-add-tag-text" ng-bind="new.tag.addTagTitle"></span>
			</span>
			<input type="text" class="andy-add-tag-input" id="addTagInput" ng-model="new.tag.input" ng-enter="new.tag.addTag()"/>
		</div>
	</div>
</div>
<br/>
<br/>
<br/>
<br/>