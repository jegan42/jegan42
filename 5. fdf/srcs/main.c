/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   main.c                                             :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: jeagan <jeagan@student.42.fr>              +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/05/26 15:55:38 by jeagan            #+#    #+#             */
/*   Updated: 2019/07/09 14:13:11 by jeagan           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "f_d_f.h"

static int	init_var(t_var **try, char *name)
{
	if (!((*try) = (t_var *)malloc(sizeof(t_var))))
		return (free_err(*try, 2, "[malloc > t_var]"));
	(*try)->file = NULL;
	(*try)->width = -1;
	(*try)->height = 0;
	(*try)->stck = NULL;
	(*try)->width_tmp = 0;
	(*try)->line = NULL;
	(*try)->leaks = NULL;
	(*try)->ret = 0;
	(*try)->tab = NULL;
	(*try)->ok = 0;
	(*try)->i = 0;
	(*try)->j = 0;
	(*try)->tb_l = NULL;
	(*try)->tb = NULL;
	(*try)->add_color = NULL;
	(*try)->name = name;
	(*try)->ptr = NULL;
	return (1);
}

static int	check_color(t_var *v)
{
	if (v->tab[v->i][v->j] && v->tab[v->i][v->j] == ',')
	{
		++v->j;
		if (v->tab[v->i][v->j] && v->tab[v->i][v->j] == '0'
			&& v->tab[v->i][v->j + 1] && v->tab[v->i][v->j + 1] == 'x')
		{
			v->j += 2;
			v->ok = v->j;
			while (ft_isdigit(v->tab[v->i][v->j])
				|| ('A' <= v->tab[v->i][v->j] && v->tab[v->i][v->j] <= 'F')
				|| ('a' <= v->tab[v->i][v->j] && v->tab[v->i][v->j] <= 'f'))
				++v->j;
		}
		else if (ft_isdigit(v->tab[v->i][v->j]))
		{
			v->ok = v->j;
			while (ft_isdigit(v->tab[v->i][v->j]))
				++v->j;
		}
		if (v->ok + 6 != v->j)
			return (free_err(v, 4, "[parametre for color]"));
	}
	return (1);
}

static int	check_line(t_var *try)
{
	if (!(try->tab = ft_strsplit(try->line, ' ')))
		return (free_err(try, 3, "[malloc > check_line/split]"));
	try->i = -1;
	while (try->tab[++(try->i)] && !(try->j = 0))
	{
		try->ok = (try->tab[try->i][try->j] && (try->tab[try->i][try->j] == '-'
				|| try->tab[try->i][try->j] == '+')) ? ++try->j : try->j;
		while (try->tab[try->i][try->j] && ft_isdigit(try->tab[try->i][try->j]))
			++try->j;
		if (try->ok == try->j)
			return (free_err(try, 3, "[number for axe Z]"));
		if (!check_color(try))
			return (free_err(try, 3, "[check_color]"));
		if (try->tab[try->i][try->j])
			return (free_err(try, 3, "[invalid point]"));
	}
	if (try->tab)
		free_tab(try->tab, NULL, 0);
	return (try->i);
}

static int	read_file(t_var *try)
{
	while ((try->ret = ft_gnl(try->fd, &try->line)) > 0)
	{
		if (!(try->width_tmp = check_line(try)))
			return (free_err(try, 2, "[check_line]"));
		if (try->width < 0)
			try->width = try->width_tmp;
		else if (try->width != try->width_tmp)
			return (free_err(try, 2, "[number of params in a file]"));
		if (try->file[0])
		{
			if (!(try->leaks = ft_strjoin(try->file, "\n")))
				return (free_err(try, 2, "[malloc > read_file/join 1]"));
			free(try->file);
			try->file = try->leaks;
		}
		if (!(try->leaks = ft_strjoin(try->file, try->line)))
			return (free_err(try, 2, "[malloc > read_file/join 2]"));
		free(try->file);
		try->file = try->leaks;
		free(try->line);
	}
	try->height = ft_nbc(try->file, '\n') + 1;
	if (!ft_strlen(try->file))
		return (free_err(try, 2, "[nothing in file]"));
	return ((try->ret < 0) ? free_err(try, 2, "[invalid file]") : 1);
}

int			main(int ac, char **av)
{
	t_var	*try;

	try = NULL;
	if (ac < 2)
		return (free_err(NULL, 1, "[no input]"));
	if (ac > 2)
		return (free_err(NULL, 1, "[too much input]"));
	if (!(init_var(&try, av[1])))
		return (free_err(try, 1, "[init var]"));
	try->fd = open(av[1], O_RDONLY);
	if (0 > try->fd || try->fd > OPEN_MAX)
		return (free_err(try, 1, "[open_file]"));
	if (!(try->file = ft_strnew(0)))
		return (free_err(try, 1, "[malloc > main/new]"));
	if (!(read_file(try)))
		return (free_err(try, 1, "[read_file]"));
	if (!(stock_pt(try)))
		return (free_err(try, 1, "[stock_pt]"));
	if (!(run_win(try)))
		return (free_err(try, 1, "[run_win]"));
	return (free_err(try, -1, "[Program fdf finish.]"));
}
