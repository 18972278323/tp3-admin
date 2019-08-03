# 1、LifecycleException

## **1.1 报错场景**

tomcat 启动时

## 1.2 报错详情

```Java
java.util.concurrent.ExecutionException: org.apache.catalina.LifecycleException: Failed to start component [StandardEngine[Tomcat].StandardHost[localhost].StandardContext[]]
	at java.util.concurrent.FutureTask.report(FutureTask.java:122)
	at java.util.concurrent.FutureTask.get(FutureTask.java:192)
	at org.apache.catalina.core.ContainerBase.startInternal(ContainerBase.java:1123)
	at org.apache.catalina.core.StandardHost.startInternal(StandardHost.java:800)
	at org.apache.catalina.util.LifecycleBase.start(LifecycleBase.java:150)
	at org.apache.catalina.core.ContainerBase$StartChild.call(ContainerBase.java:1559)
	at org.apache.catalina.core.ContainerBase$StartChild.call(ContainerBase.java:1549)
	at java.util.concurrent.FutureTask.run(FutureTask.java:266)
	at java.util.concurrent.ThreadPoolExecutor.runWorker(ThreadPoolExecutor.java:1149)
	at java.util.concurrent.ThreadPoolExecutor$Worker.run(ThreadPoolExecutor.java:624)
	at java.lang.Thread.run(Thread.java:748)
Caused by: org.apache.catalina.LifecycleException: Failed to start component [StandardEngine[Tomcat].StandardHost[localhost].StandardContext[]]
	at org.apache.catalina.util.LifecycleBase.start(LifecycleBase.java:154)
	... 6 more
Caused by: java.lang.LinkageError: loader constraint violation: loader (instance of org/apache/catalina/loader/WebappClassLoader) previously initiated loading for a different type with name "javax/servlet/ServletContext"
	at java.lang.ClassLoader.defineClass1(Native Method)
	at java.lang.ClassLoader.defineClass(ClassLoader.java:763)
	at java.security.SecureClassLoader.defineClass(SecureClassLoader.java:142)
	at java.net.URLClassLoader.defineClass(URLClassLoader.java:467)
	at java.net.URLClassLoader.access$100(URLClassLoader.java:73)
	at java.net.URLClassLoader$1.run(URLClassLoader.java:368)
	at java.net.URLClassLoader$1.run(URLClassLoader.java:362)
	at java.security.AccessController.doPrivileged(Native Method)
	at java.net.URLClassLoader.findClass(URLClassLoader.java:361)
	at org.apache.catalina.loader.WebappClassLoader.findClass(WebappClassLoader.java:1191)
	at org.apache.catalina.loader.WebappClassLoader.loadClass(WebappClassLoader.java:1669)
	at org.apache.catalina.loader.WebappClassLoader.loadClass(WebappClassLoader.java:1547)
	at org.springframework.web.SpringServletContainerInitializer.onStartup(SpringServletContainerInitializer.java:164)
	at org.apache.catalina.core.StandardContext.startInternal(StandardContext.java:5423)
	at org.apache.catalina.util.LifecycleBase.start(LifecycleBase.java:150)
	... 6 more

六月 25, 2019 9:42:35 下午 org.apache.catalina.core.ContainerBase startInternal
严重: A child container failed during start
java.util.concurrent.ExecutionException: org.apache.catalina.LifecycleException: Failed to start component [StandardEngine[Tomcat].StandardHost[localhost]]
	at java.util.concurrent.FutureTask.report(FutureTask.java:122)
	at java.util.concurrent.FutureTask.get(FutureTask.java:192)
	at org.apache.catalina.core.ContainerBase.startInternal(ContainerBase.java:1123)
	at org.apache.catalina.core.StandardEngine.startInternal(StandardEngine.java:302)
	at org.apache.catalina.util.LifecycleBase.start(LifecycleBase.java:150)
	at org.apache.catalina.core.StandardService.startInternal(StandardService.java:443)
	at org.apache.catalina.util.LifecycleBase.start(LifecycleBase.java:150)
	at org.apache.catalina.core.StandardServer.startInternal(StandardServer.java:732)
	at org.apache.catalina.util.LifecycleBase.start(LifecycleBase.java:150)
	at org.apache.catalina.startup.Tomcat.start(Tomcat.java:341)
	at org.apache.tomcat.maven.plugin.tomcat7.run.AbstractRunMojo.startContainer(AbstractRunMojo.java:1238)
	at org.apache.tomcat.maven.plugin.tomcat7.run.AbstractRunMojo.execute(AbstractRunMojo.java:592)
	at org.apache.maven.plugin.DefaultBuildPluginManager.executeMojo(DefaultBuildPluginManager.java:137)
	at org.apache.maven.lifecycle.internal.MojoExecutor.execute(MojoExecutor.java:210)
	at org.apache.maven.lifecycle.internal.MojoExecutor.execute(MojoExecutor.java:156)
	at org.apache.maven.lifecycle.internal.MojoExecutor.execute(MojoExecutor.java:148)
	at org.apache.maven.lifecycle.internal.LifecycleModuleBuilder.buildProject(LifecycleModuleBuilder.java:117)
	at org.apache.maven.lifecycle.internal.LifecycleModuleBuilder.buildProject(LifecycleModuleBuilder.java:81)
	at org.apache.maven.lifecycle.internal.builder.singlethreaded.SingleThreadedBuilder.build(SingleThreadedBuilder.java:56)
	at org.apache.maven.lifecycle.internal.LifecycleStarter.execute(LifecycleStarter.java:128)
	at org.apache.maven.DefaultMaven.doExecute(DefaultMaven.java:305)
	at org.apache.maven.DefaultMaven.doExecute(DefaultMaven.java:192)
	at org.apache.maven.DefaultMaven.execute(DefaultMaven.java:105)
	at org.apache.maven.cli.MavenCli.execute(MavenCli.java:956)
	at org.apache.maven.cli.MavenCli.doMain(MavenCli.java:288)
	at org.apache.maven.cli.MavenCli.main(MavenCli.java:192)
	at sun.reflect.NativeMethodAccessorImpl.invoke0(Native Method)
	at sun.reflect.NativeMethodAccessorImpl.invoke(NativeMethodAccessorImpl.java:62)
	at sun.reflect.DelegatingMethodAccessorImpl.invoke(DelegatingMethodAccessorImpl.java:43)
	at java.lang.reflect.Method.invoke(Method.java:498)
	at org.codehaus.plexus.classworlds.launcher.Launcher.launchEnhanced(Launcher.java:282)
	at org.codehaus.plexus.classworlds.launcher.Launcher.launch(Launcher.java:225)
	at org.codehaus.plexus.classworlds.launcher.Launcher.mainWithExitCode(Launcher.java:406)
	at org.codehaus.plexus.classworlds.launcher.Launcher.main(Launcher.java:347)
	at org.codehaus.classworlds.Launcher.main(Launcher.java:47)
Caused by: org.apache.catalina.LifecycleException: Failed to start component [StandardEngine[Tomcat].StandardHost[localhost]]
	at org.apache.catalina.util.LifecycleBase.start(LifecycleBase.java:154)
	at org.apache.catalina.core.ContainerBase$StartChild.call(ContainerBase.java:1559)
	at org.apache.catalina.core.ContainerBase$StartChild.call(ContainerBase.java:1549)
	at java.util.concurrent.FutureTask.run(FutureTask.java:266)
	at java.util.concurrent.ThreadPoolExecutor.runWorker(ThreadPoolExecutor.java:1149)
	at java.util.concurrent.ThreadPoolExecutor$Worker.run(ThreadPoolExecutor.java:624)
	at java.lang.Thread.run(Thread.java:748)
Caused by: org.apache.catalina.LifecycleException: A child container failed during start
	at org.apache.catalina.core.ContainerBase.startInternal(ContainerBase.java:1131)
	at org.apache.catalina.core.StandardHost.startInternal(StandardHost.java:800)
	at org.apache.catalina.util.LifecycleBase.start(LifecycleBase.java:150)
	... 6 more
```

## 1.3 可能原因

jar 包冲突

## 1.4 解决方案

检查 `servlet-api`、`jsp` 等的相关依赖是否添加了 `prodided` 属性



#2、BindingException

## 2.1 报错场景

`ssm` 框架整合测试项目时

## 2.2 报错详情

```java
org.apache.ibatis.binding.BindingException: Invalid bound statement (not found): cn.cigar.mapper.UserMapper.addUser

	at org.apache.ibatis.binding.MapperMethod$SqlCommand.<init>(MapperMethod.java:189)
	at org.apache.ibatis.binding.MapperMethod.<init>(MapperMethod.java:43)
	at org.apache.ibatis.binding.MapperProxy.cachedMapperMethod(MapperProxy.java:58)
	at org.apache.ibatis.binding.MapperProxy.invoke(MapperProxy.java:51)
	at com.sun.proxy.$Proxy15.addUser(Unknown Source)
	at cn.cigar.test.MangerTest.testAddUser(MangerTest.java:24)
	at sun.reflect.NativeMethodAccessorImpl.invoke0(Native Method)
	at sun.reflect.NativeMethodAccessorImpl.invoke(NativeMethodAccessorImpl.java:62)
	at sun.reflect.DelegatingMethodAccessorImpl.invoke(DelegatingMethodAccessorImpl.java:43)
	at java.lang.reflect.Method.invoke(Method.java:498)
	at org.junit.runners.model.FrameworkMethod$1.runReflectiveCall(FrameworkMethod.java:47)
	at org.junit.internal.runners.model.ReflectiveCallable.run(ReflectiveCallable.java:12)
	at org.junit.runners.model.FrameworkMethod.invokeExplosively(FrameworkMethod.java:44)
	at org.junit.internal.runners.statements.InvokeMethod.evaluate(InvokeMethod.java:17)
	at org.springframework.test.context.junit4.statements.RunBeforeTestMethodCallbacks.evaluate(RunBeforeTestMethodCallbacks.java:75)
	at org.springframework.test.context.junit4.statements.RunAfterTestMethodCallbacks.evaluate(RunAfterTestMethodCallbacks.java:86)
	at org.springframework.test.context.junit4.statements.SpringRepeat.evaluate(SpringRepeat.java:84)
	at org.junit.runners.ParentRunner.runLeaf(ParentRunner.java:271)
	at org.springframework.test.context.junit4.SpringJUnit4ClassRunner.runChild(SpringJUnit4ClassRunner.java:254)
	at org.springframework.test.context.junit4.SpringJUnit4ClassRunner.runChild(SpringJUnit4ClassRunner.java:89)
	at org.junit.runners.ParentRunner$3.run(ParentRunner.java:238)
	at org.junit.runners.ParentRunner$1.schedule(ParentRunner.java:63)
	at org.junit.runners.ParentRunner.runChildren(ParentRunner.java:236)
	at org.junit.runners.ParentRunner.access$000(ParentRunner.java:53)
	at org.junit.runners.ParentRunner$2.evaluate(ParentRunner.java:229)
	at org.springframework.test.context.junit4.statements.RunBeforeTestClassCallbacks.evaluate(RunBeforeTestClassCallbacks.java:61)
	at org.springframework.test.context.junit4.statements.RunAfterTestClassCallbacks.evaluate(RunAfterTestClassCallbacks.java:70)
	at org.junit.runners.ParentRunner.run(ParentRunner.java:309)
	at org.springframework.test.context.junit4.SpringJUnit4ClassRunner.run(SpringJUnit4ClassRunner.java:193)
	at org.junit.runner.JUnitCore.run(JUnitCore.java:160)
	at com.intellij.junit4.JUnit4IdeaTestRunner.startRunnerWithArgs(JUnit4IdeaTestRunner.java:68)
	at com.intellij.rt.execution.junit.IdeaTestRunner$Repeater.startRunnerWithArgs(IdeaTestRunner.java:47)
	at com.intellij.rt.execution.junit.JUnitStarter.prepareStreamsAndStart(JUnitStarter.java:242)
	at com.intellij.rt.execution.junit.JUnitStarter.main(JUnitStarter.java:70)

```

## 2.3 可能原因

和 `mapper` 相互绑定的 `.xml` 文件不是代码，无需编译。但是需要指定在编译时，将指定的资源文件（此处为 `.xml` 文件）拷贝到对应目录下（此处应当为编译好之后类文件的对应目录）

## 2.4 解决方案

在当前工程的 `pom.xml` 文件中，或在父工程的 `pom.xml` 文件中添加资源拷贝插件的依赖 

```xml
<build>
    <resources>
        <resource>
            <directory>src/main/java</directory>
            <includes>
                <include>**/*.xml</include>
            </includes>
        </resource>
    </resources>
</build>
```

参见[此链接](https://blog.csdn.net/weixin_37882382/article/details/80504841)



# 3、